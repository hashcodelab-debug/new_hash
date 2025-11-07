# HashCodeLab - Professional IT Services Website

A complete, modern, and fully functional website for HashCodeLab IT services company.

## 🚀 Features

### Frontend (React)
- **Modern Design**: Professional blue-themed design with smooth animations
- **Fully Responsive**: Mobile-first approach, works on all devices
- **Complete Pages**:
  - Home (Hero, Services, Portfolio, Testimonials, Stats, Blog, CTA)
  - About Us
  - 6 Individual Service Pages (Web Design, App Dev, Web Apps, Graphic Design, SEO, AI Solutions)
  - Portfolio with filtering
  - Individual Project Detail pages
  - Blog with search functionality
  - Individual Blog Post pages
  - Contact Us with functional form
  - Careers
  - Privacy Policy
  - Terms & Conditions
  - Custom 404 page
- **Components**:
  - Responsive navigation with dropdown
  - Footer with newsletter signup
  - Cookie consent banner
  - WhatsApp integration button
  - Scroll-to-top functionality

### Backend (FastAPI + MongoDB)
- **Contact Form**: Full validation, database storage, email notifications
- **Blog Management**: CRUD operations for blog posts
- **Portfolio Management**: CRUD operations for projects
- **Testimonials**: API for client testimonials
- **Email System**: Automated emails using SMTP
- **Data Seeding**: Pre-populated sample data

### Database (MongoDB)
- Contact queries collection
- Blog posts collection
- Projects collection
- Testimonials collection

## 📁 Project Structure

```
/app/
├── backend/
│   ├── server.py           # Main FastAPI application
│   ├── seed_data.py        # Database seeding script
│   ├── .env                # Environment variables
│   └── requirements.txt    # Python dependencies
├── frontend/
│   ├── src/
│   │   ├── components/     # Reusable components
│   │   ├── pages/          # Page components
│   │   ├── App.js          # Main App component
│   │   └── App.css         # Global styles
│   ├── public/
│   └── package.json
└── PHP_MYSQL_MIGRATION/    # PHP + MySQL alternative
    ├── database_schema.sql
    ├── contact_form.php
    └── README.md
```

## 🛠️ Setup Instructions

### Prerequisites
- Node.js (v16+)
- Python (3.8+)
- MongoDB (running on localhost:27017)

### Installation

1. **Backend Setup**
   ```bash
   cd /app/backend
   pip install -r requirements.txt
   
   # Seed the database with sample data
   python seed_data.py
   ```

2. **Frontend Setup**
   ```bash
   cd /app/frontend
   yarn install
   ```

3. **Environment Configuration**
   
   Update `/app/backend/.env` with your SMTP credentials:
   ```env
   SMTP_HOST="smtp.gmail.com"
   SMTP_PORT="587"
   SMTP_USER="your-email@gmail.com"
   SMTP_PASSWORD="your-app-password"
   ADMIN_EMAIL="admin@hashcodelab.com"
   ```

4. **Start Services**
   ```bash
   sudo supervisorctl restart backend frontend
   ```

## 📧 Email Configuration

### Gmail Setup (Recommended)

1. **Enable 2-Factor Authentication**
   - Go to your Google Account settings
   - Enable 2-Step Verification

2. **Generate App Password**
   - Visit: https://myaccount.google.com/security
   - Select "2-Step Verification"
   - Scroll to "App passwords"
   - Generate password for "Mail"
   - Use this password in SMTP_PASSWORD

3. **Update .env file**
   ```env
   SMTP_USER="your-email@gmail.com"
   SMTP_PASSWORD="your-16-char-app-password"
   ADMIN_EMAIL="admin@hashcodelab.com"
   ```

### Alternative SMTP Providers

**SendGrid**:
```env
SMTP_HOST="smtp.sendgrid.net"
SMTP_PORT="587"
SMTP_USER="apikey"
SMTP_PASSWORD="your-sendgrid-api-key"
```

**Mailgun**:
```env
SMTP_HOST="smtp.mailgun.org"
SMTP_PORT="587"
SMTP_USER="postmaster@your-domain.mailgun.org"
SMTP_PASSWORD="your-mailgun-password"
```

## 🗄️ Database Management

### View Data
```bash
# Connect to MongoDB
mongosh

# Switch to database
use hashcodelab_db

# View collections
show collections

# View contact queries
db.contact_queries.find().pretty()

# View projects
db.projects.find().pretty()

# View blog posts
db.blog_posts.find().pretty()
```

### Reseed Database
```bash
cd /app/backend
python seed_data.py
```

## 🔄 PHP + MySQL Migration

If you need to use PHP + MySQL instead of FastAPI + MongoDB:

1. Navigate to `/app/PHP_MYSQL_MIGRATION/`
2. Follow instructions in `README.md`
3. Import `database_schema.sql` to MySQL
4. Configure `contact_form.php` with your credentials
5. Upload to your PHP hosting

## 📱 Features Details

### Contact Form
- **Fields**: Name, Email, Phone, Company, Service, Budget, Message, How Heard
- **Validation**: Client-side and server-side
- **Email Notifications**: Both admin and client receive emails
- **Database Storage**: All submissions saved to MongoDB
- **Privacy Agreement**: Required checkbox

### Services
- Web Design & Development
- App Development (iOS & Android)
- Web Applications (React, PHP, WordPress)
- Graphic Design (Logos, Print Materials)
- SEO & Digital Marketing
- AI Solutions & Chatbots

### Portfolio
- 6 Sample Projects
- Filterable by category
- Individual project detail pages
- Client testimonials
- Technology stack display

### Blog
- 3 Sample Blog Posts
- Search functionality
- Category filtering
- Individual blog post pages
- Related articles

## 🎨 Design System

### Colors
- Primary: Blue (#3b82f6)
- Secondary: Blue-800 (#1e40af)
- Background: White & Gray-50
- Text: Gray-900, Gray-700, Gray-600

### Typography
- Headings: Space Grotesk
- Body: Inter
- Sizes: Responsive (4xl-6xl for H1, base-lg for body)

### Components
- Shadcn UI library
- Custom styled buttons
- Card hover effects
- Smooth animations

## 🧪 Testing

### Test Contact Form
```bash
curl -X POST http://localhost:8001/api/contact \
  -H "Content-Type: application/json" \
  -d '{
    "full_name": "John Doe",
    "email": "john@example.com",
    "service_interested": "Web Design",
    "message": "This is a test message with more than 50 characters to meet the minimum requirement.",
    "agree_privacy": true
  }'
```

### Test API Endpoints
```bash
# Get all projects
curl http://localhost:8001/api/projects

# Get all blog posts
curl http://localhost:8001/api/blog

# Get testimonials
curl http://localhost:8001/api/testimonials
```

## 🔧 Customization

### Update Company Info
1. **Logo**: Replace in Navbar and Footer components
2. **Contact Details**: Update in Contact.jsx and Footer.jsx
3. **Social Links**: Update in Footer.jsx
4. **WhatsApp Number**: Update in WhatsAppButton.jsx

### Add New Service
1. Add service data in `ServicesPage.jsx`
2. Update services array in `Home.jsx`
3. Update Navbar dropdown

### Add New Project
1. Add to MongoDB via seed_data.py
2. Or add directly to database

## 📊 SEO

- Semantic HTML5
- Meta tags for all pages
- Clean URL structure
- Alt text for images
- Fast loading (optimized images)
- Mobile-responsive
- Accessible components

## 🔐 Security

- Input validation (client & server)
- Email validation
- XSS protection (React escapes by default)
- CORS configuration
- Environment variables for sensitive data
- Privacy policy compliance

## 📈 Performance

- Lazy loading for pages
- Image optimization
- Code splitting
- Fast API responses
- Efficient database queries

## 🚀 Deployment

### Frontend
```bash
cd /app/frontend
yarn build
# Deploy build folder to static hosting (Netlify, Vercel, etc.)
```

### Backend
- Deploy to any Python hosting (Heroku, DigitalOcean, AWS)
- Ensure MongoDB connection string is updated
- Set environment variables on hosting platform

## 📝 Notes

- **Current Stack**: FastAPI + React + MongoDB (fully functional)
- **Alternative**: PHP + MySQL files provided in `/app/PHP_MYSQL_MIGRATION/`
- **SMTP**: Configure your email credentials to enable contact form emails
- **Sample Data**: Pre-loaded with projects, blog posts, and testimonials
- **No Admin Panel**: Contact form submissions saved to database (viewable via MongoDB)

## 🆘 Troubleshooting

### Backend not starting
```bash
tail -f /var/log/supervisor/backend.err.log
```

### Frontend not loading
```bash
tail -f /var/log/supervisor/frontend.err.log
```

### Database connection issues
```bash
# Check MongoDB status
sudo systemctl status mongodb

# Restart MongoDB
sudo systemctl restart mongodb
```

### Email not sending
- Verify SMTP credentials
- Check spam folder
- Review backend logs
- Ensure 2FA and app password for Gmail

## 📞 Support

For questions or issues:
- Check logs in `/var/log/supervisor/`
- Review MongoDB data
- Verify environment variables

## ✨ Features Summary

✅ Complete professional website
✅ 12+ pages with full functionality
✅ Working contact form with email
✅ Portfolio showcase
✅ Blog system
✅ Responsive design
✅ Modern UI/UX
✅ SEO optimized
✅ Fast loading
✅ Database integration
✅ Email notifications
✅ PHP/MySQL migration files included

---

**Built with ❤️ for HashCodeLab**

© 2025 HashCodeLab. All rights reserved.