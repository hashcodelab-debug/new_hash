# Run this script to populate the database with sample data
import asyncio
from motor.motor_asyncio import AsyncIOMotorClient
from datetime import datetime, timezone
import os
from dotenv import load_dotenv
from pathlib import Path

ROOT_DIR = Path(__file__).parent
load_dotenv(ROOT_DIR / '.env')

mongo_url = os.environ['MONGO_URL']
client = AsyncIOMotorClient(mongo_url)
db = client[os.environ['DB_NAME']]


async def seed_database():
    # Clear existing data
    await db.blog_posts.delete_many({})
    await db.projects.delete_many({})
    await db.testimonials.delete_many({})
    
    # Seed Blog Posts
    blog_posts = [
        {
            "id": "blog-1",
            "title": "Top 10 Web Design Trends in 2025",
            "slug": "web-design-trends-2025",
            "excerpt": "Discover the latest web design trends that are shaping the digital landscape in 2025.",
            "content": "<p>The web design landscape is constantly evolving. In 2025, we're seeing a shift towards more immersive and interactive experiences...</p>",
            "category": "Web Development",
            "author": "Sarah Johnson",
            "image": "https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800",
            "published_date": datetime.now(timezone.utc).isoformat(),
            "tags": ["design", "trends", "web"]
        },
        {
            "id": "blog-2",
            "title": "How AI is Transforming Business Operations",
            "slug": "ai-transforming-business",
            "excerpt": "Learn how artificial intelligence is revolutionizing the way businesses operate in the modern era.",
            "content": "<p>Artificial Intelligence is no longer a futuristic concept but a present-day reality that's reshaping industries...</p>",
            "category": "Technology News",
            "author": "Michael Chen",
            "image": "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800",
            "published_date": datetime.now(timezone.utc).isoformat(),
            "tags": ["AI", "business", "automation"]
        },
        {
            "id": "blog-3",
            "title": "SEO Best Practices for 2025",
            "slug": "seo-best-practices-2025",
            "excerpt": "Stay ahead of the competition with these proven SEO strategies for better search engine rankings.",
            "content": "<p>Search Engine Optimization continues to be crucial for online visibility. Here are the best practices for 2025...</p>",
            "category": "SEO Tips",
            "author": "Emily Rodriguez",
            "image": "https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=800",
            "published_date": datetime.now(timezone.utc).isoformat(),
            "tags": ["SEO", "marketing", "optimization"]
        }
    ]
    
    await db.blog_posts.insert_many(blog_posts)
    print("✓ Blog posts seeded")
    
    # Seed Projects
    projects = [
        {
            "id": "project-1",
            "title": "E-Commerce Platform for Fashion Brand",
            "slug": "fashion-ecommerce-platform",
            "category": "Web Design",
            "description": "A complete e-commerce solution with modern UI/UX design and seamless checkout experience.",
            "client": "StyleHub Fashion",
            "technologies": ["React", "Node.js", "MongoDB", "Stripe"],
            "image": "https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800",
            "images": ["https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800"],
            "problem": "Client needed a modern, mobile-responsive e-commerce platform to expand their online presence.",
            "solution": "We developed a custom e-commerce platform with advanced filtering, wishlist functionality, and secure payment integration.",
            "results": "300% increase in online sales, 45% improvement in mobile conversions within 3 months.",
            "testimonial": "HashCodeLab transformed our online business. The platform is intuitive and our sales have skyrocketed!"
        },
        {
            "id": "project-2",
            "title": "Mobile Fitness Tracking App",
            "slug": "fitness-tracking-app",
            "category": "App Development",
            "description": "Cross-platform mobile app for fitness enthusiasts with AI-powered workout recommendations.",
            "client": "FitLife Pro",
            "technologies": ["React Native", "Firebase", "TensorFlow", "Node.js"],
            "image": "https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800",
            "images": ["https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800"],
            "problem": "Need for a comprehensive fitness tracking solution with personalized workout plans.",
            "solution": "Built a cross-platform app with AI-driven workout suggestions, progress tracking, and social features.",
            "results": "50,000+ downloads in first quarter, 4.8-star rating on app stores.",
            "testimonial": "The app exceeded our expectations. Users love the AI recommendations!"
        },
        {
            "id": "project-3",
            "title": "Corporate Brand Identity Design",
            "slug": "corporate-brand-identity",
            "category": "Graphic Design",
            "description": "Complete brand identity package including logo, business cards, and marketing materials.",
            "client": "TechVision Solutions",
            "technologies": ["Adobe Illustrator", "Photoshop", "InDesign"],
            "image": "https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800",
            "images": ["https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800"],
            "problem": "Startup needed professional brand identity to establish credibility in competitive market.",
            "solution": "Created comprehensive brand guidelines with modern logo, color palette, and marketing collateral.",
            "results": "Enhanced brand recognition, professional market presence, positive client feedback.",
            "testimonial": None
        },
        {
            "id": "project-4",
            "title": "AI Customer Support Chatbot",
            "slug": "ai-customer-support-chatbot",
            "category": "AI Solutions",
            "description": "Intelligent chatbot system for automated customer support with natural language processing.",
            "client": "RetailMax Inc.",
            "technologies": ["Python", "TensorFlow", "NLP", "React"],
            "image": "https://images.unsplash.com/photo-1531746790731-6c087fecd65a?w=800",
            "images": ["https://images.unsplash.com/photo-1531746790731-6c087fecd65a?w=800"],
            "problem": "High volume of customer inquiries overwhelming support team.",
            "solution": "Developed AI chatbot capable of handling 80% of common customer queries with human-like responses.",
            "results": "60% reduction in support ticket volume, 24/7 customer support availability.",
            "testimonial": "The chatbot has been a game-changer for our customer service operations."
        },
        {
            "id": "project-5",
            "title": "Real Estate Property Portal",
            "slug": "real-estate-portal",
            "category": "Web Applications",
            "description": "Comprehensive property listing platform with advanced search and virtual tours.",
            "client": "PrimeProperties",
            "technologies": ["PHP", "Laravel", "MySQL", "Vue.js"],
            "image": "https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800",
            "images": ["https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800"],
            "problem": "Needed modern platform to showcase properties with interactive features.",
            "solution": "Built feature-rich portal with map integration, virtual tours, and advanced filtering.",
            "results": "150% increase in property inquiries, reduced time-to-sale by 30%.",
            "testimonial": None
        },
        {
            "id": "project-6",
            "title": "Restaurant Website & Ordering System",
            "slug": "restaurant-ordering-system",
            "category": "Web Design",
            "description": "Beautiful restaurant website with integrated online ordering and reservation system.",
            "client": "Gourmet Bistro",
            "technologies": ["WordPress", "WooCommerce", "PHP", "JavaScript"],
            "image": "https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800",
            "images": ["https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800"],
            "problem": "Restaurant needed online presence and digital ordering capabilities.",
            "solution": "Created stunning website with menu showcase, online ordering, and table reservation system.",
            "results": "40% increase in online orders, improved customer engagement.",
            "testimonial": "Our customers love the easy online ordering. Business has never been better!"
        }
    ]
    
    await db.projects.insert_many(projects)
    print("✓ Projects seeded")
    
    # Seed Testimonials
    testimonials = [
        {
            "id": "test-1",
            "name": "David Martinez",
            "company": "StyleHub Fashion",
            "position": "CEO",
            "content": "HashCodeLab delivered an exceptional e-commerce platform that exceeded our expectations. Their attention to detail and technical expertise is unmatched.",
            "image": "https://i.pravatar.cc/150?img=12",
            "rating": 5
        },
        {
            "id": "test-2",
            "name": "Jennifer Lee",
            "company": "FitLife Pro",
            "position": "Founder",
            "content": "The mobile app they developed has been instrumental in our growth. The team was professional, responsive, and delivered on time.",
            "image": "https://i.pravatar.cc/150?img=5",
            "rating": 5
        },
        {
            "id": "test-3",
            "name": "Robert Thompson",
            "company": "RetailMax Inc.",
            "position": "CTO",
            "content": "The AI chatbot solution has transformed our customer service. We've seen a dramatic reduction in support costs while improving customer satisfaction.",
            "image": "https://i.pravatar.cc/150?img=33",
            "rating": 5
        },
        {
            "id": "test-4",
            "name": "Amanda Foster",
            "company": "TechVision Solutions",
            "position": "Marketing Director",
            "content": "Their graphic design work gave our brand the professional identity we needed. Highly creative and responsive to feedback.",
            "image": "https://i.pravatar.cc/150?img=9",
            "rating": 5
        },
        {
            "id": "test-5",
            "name": "James Wilson",
            "company": "Gourmet Bistro",
            "position": "Owner",
            "content": "Our new website and ordering system has been a game-changer. Online orders have increased significantly since launch.",
            "image": "https://i.pravatar.cc/150?img=15",
            "rating": 5
        }
    ]
    
    await db.testimonials.insert_many(testimonials)
    print("✓ Testimonials seeded")
    
    print("\n✓ Database seeding completed successfully!")


if __name__ == "__main__":
    asyncio.run(seed_database())