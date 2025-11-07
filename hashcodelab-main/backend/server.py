from fastapi import FastAPI, APIRouter, HTTPException, UploadFile, File
from dotenv import load_dotenv
from starlette.middleware.cors import CORSMiddleware
from motor.motor_asyncio import AsyncIOMotorClient
import os
import logging
from pathlib import Path
from pydantic import BaseModel, Field, ConfigDict, EmailStr
from typing import List, Optional
import uuid
from datetime import datetime, timezone
import aiosmtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart


ROOT_DIR = Path(__file__).parent
load_dotenv(ROOT_DIR / '.env')

# MongoDB connection
mongo_url = os.environ['MONGO_URL']
client = AsyncIOMotorClient(mongo_url)
db = client[os.environ['DB_NAME']]

# Create the main app without a prefix
app = FastAPI()

# Create a router with the /api prefix
api_router = APIRouter(prefix="/api")


# Define Models
class ContactQuery(BaseModel):
    model_config = ConfigDict(extra="ignore")
    
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    full_name: str
    email: EmailStr
    phone: Optional[str] = None
    company_name: Optional[str] = None
    service_interested: str
    budget: Optional[str] = None
    message: str
    how_heard: Optional[str] = None
    agree_privacy: bool
    submission_date: datetime = Field(default_factory=lambda: datetime.now(timezone.utc))
    ip_address: Optional[str] = None
    status: str = "new"

class ContactQueryCreate(BaseModel):
    full_name: str
    email: EmailStr
    phone: Optional[str] = None
    company_name: Optional[str] = None
    service_interested: str
    budget: Optional[str] = None
    message: str
    how_heard: Optional[str] = None
    agree_privacy: bool

class BlogPost(BaseModel):
    model_config = ConfigDict(extra="ignore")
    
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    title: str
    slug: str
    excerpt: str
    content: str
    category: str
    author: str
    image: str
    published_date: datetime
    tags: List[str] = []

class Project(BaseModel):
    model_config = ConfigDict(extra="ignore")
    
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    title: str
    slug: str
    category: str
    description: str
    client: str
    technologies: List[str]
    image: str
    images: List[str] = []
    problem: str
    solution: str
    results: str
    testimonial: Optional[str] = None

class Testimonial(BaseModel):
    model_config = ConfigDict(extra="ignore")
    
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    name: str
    company: str
    position: str
    content: str
    image: str
    rating: int = 5


# Email sending function
async def send_email(to_email: str, subject: str, body: str):
    try:
        smtp_host = os.environ.get('SMTP_HOST', 'smtp.gmail.com')
        smtp_port = int(os.environ.get('SMTP_PORT', '587'))
        smtp_user = os.environ.get('SMTP_USER', '')
        smtp_password = os.environ.get('SMTP_PASSWORD', '')
        
        if not smtp_user or not smtp_password:
            logging.warning("SMTP credentials not configured. Email not sent.")
            return False
        
        message = MIMEMultipart()
        message['From'] = smtp_user
        message['To'] = to_email
        message['Subject'] = subject
        message.attach(MIMEText(body, 'html'))
        
        await aiosmtplib.send(
            message,
            hostname=smtp_host,
            port=smtp_port,
            username=smtp_user,
            password=smtp_password,
            start_tls=True,
        )
        return True
    except Exception as e:
        logging.error(f"Error sending email: {e}")
        return False


# Routes
@api_router.get("/")
async def root():
    return {"message": "HashCodeLab API"}


# Contact Form
@api_router.post("/contact", response_model=ContactQuery)
async def create_contact_query(input: ContactQueryCreate):
    query_dict = input.model_dump()
    query_obj = ContactQuery(**query_dict)
    
    # Convert to dict and serialize datetime
    doc = query_obj.model_dump()
    doc['submission_date'] = doc['submission_date'].isoformat()
    
    # Save to database
    await db.contact_queries.insert_one(doc)
    
    # Send admin notification email
    admin_email = os.environ.get('ADMIN_EMAIL', '')
    if admin_email:
        admin_subject = f"New Contact Query - {query_obj.service_interested}"
        admin_body = f"""
        <html>
        <body style="font-family: Arial, sans-serif;">
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> {query_obj.full_name}</p>
            <p><strong>Email:</strong> {query_obj.email}</p>
            <p><strong>Phone:</strong> {query_obj.phone or 'N/A'}</p>
            <p><strong>Company:</strong> {query_obj.company_name or 'N/A'}</p>
            <p><strong>Service Interested:</strong> {query_obj.service_interested}</p>
            <p><strong>Budget:</strong> {query_obj.budget or 'N/A'}</p>
            <p><strong>How Heard:</strong> {query_obj.how_heard or 'N/A'}</p>
            <p><strong>Message:</strong></p>
            <p>{query_obj.message}</p>
            <p><strong>Submission Date:</strong> {query_obj.submission_date}</p>
            <hr>
            <p><small>Query ID: {query_obj.id}</small></p>
        </body>
        </html>
        """
        await send_email(admin_email, admin_subject, admin_body)
    
    # Send client acknowledgment email
    client_subject = "Thank you for contacting HashCodeLab"
    client_body = f"""
    <html>
    <body style="font-family: Arial, sans-serif;">
        <h2>Thank you for reaching out!</h2>
        <p>Dear {query_obj.full_name},</p>
        <p>We have received your inquiry about <strong>{query_obj.service_interested}</strong>.</p>
        <p>Your reference number is: <strong>{query_obj.id}</strong></p>
        <p>Our team will review your message and get back to you within 24-48 hours.</p>
        <br>
        <p>Best regards,<br>HashCodeLab Team</p>
        <hr>
        <p style="font-size: 12px; color: #666;">This is an automated message. Please do not reply to this email.</p>
    </body>
    </html>
    """
    await send_email(query_obj.email, client_subject, client_body)
    
    return query_obj


# Blog Posts
@api_router.get("/blog", response_model=List[BlogPost])
async def get_blog_posts(category: Optional[str] = None):
    query = {"category": category} if category else {}
    posts = await db.blog_posts.find(query, {"_id": 0}).to_list(100)
    
    for post in posts:
        if isinstance(post['published_date'], str):
            post['published_date'] = datetime.fromisoformat(post['published_date'])
    
    return posts

@api_router.get("/blog/{slug}", response_model=BlogPost)
async def get_blog_post(slug: str):
    post = await db.blog_posts.find_one({"slug": slug}, {"_id": 0})
    if not post:
        raise HTTPException(status_code=404, detail="Blog post not found")
    
    if isinstance(post['published_date'], str):
        post['published_date'] = datetime.fromisoformat(post['published_date'])
    
    return post


# Projects/Portfolio
@api_router.get("/projects", response_model=List[Project])
async def get_projects(category: Optional[str] = None):
    query = {"category": category} if category else {}
    projects = await db.projects.find(query, {"_id": 0}).to_list(100)
    return projects

@api_router.get("/projects/{slug}", response_model=Project)
async def get_project(slug: str):
    project = await db.projects.find_one({"slug": slug}, {"_id": 0})
    if not project:
        raise HTTPException(status_code=404, detail="Project not found")
    return project


# Testimonials
@api_router.get("/testimonials", response_model=List[Testimonial])
async def get_testimonials():
    testimonials = await db.testimonials.find({}, {"_id": 0}).to_list(100)
    return testimonials


# Include the router in the main app
app.include_router(api_router)

app.add_middleware(
    CORSMiddleware,
    allow_credentials=True,
    allow_origins=os.environ.get('CORS_ORIGINS', '*').split(','),
    allow_methods=["*"],
    allow_headers=["*"],
)

# Configure logging
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s'
)
logger = logging.getLogger(__name__)

@app.on_event("shutdown")
async def shutdown_db_client():
    client.close()