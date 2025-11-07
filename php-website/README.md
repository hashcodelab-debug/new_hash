# HashCodeLab - PHP/MySQL Website

A complete, professional IT services website built with **PHP, MySQL, HTML, CSS, and JavaScript**.

## 🚀 Features

### Complete Website
- **12+ Pages**: Home, About, Services (6 pages), Portfolio, Project Details, Blog, Blog Posts, Contact, Careers, Privacy Policy, Terms, 404
- **Fully Responsive**: Mobile-first design, works on all devices
- **Modern UI**: Professional blue theme with Tailwind CSS
- **Database Driven**: MySQL database for dynamic content

### Key Functionality
- **Working Contact Form**: Full validation, database storage, email notifications (admin + client)
- **Blog System**: Display and read blog posts
- **Portfolio Showcase**: Project filtering and detail pages
- **Service Pages**: 6 individual service pages with detailed information
- **Newsletter Signup**: Footer newsletter subscription
- **WhatsApp Integration**: Floating WhatsApp button
- **Cookie Consent**: GDPR-compliant cookie banner
- **SEO Optimized**: Meta tags, semantic HTML, clean URLs

## 📁 Project Structure

```
/php-website/
├── index.php              # Home page
├── about.php              # About page
├── services.php           # Services pages (dynamic)
├── portfolio.php          # Portfolio listing
├── project-detail.php     # Individual project pages
├── blog.php               # Blog listing
├── blog-post.php          # Individual blog posts
├── contact.php            # Contact form
├── careers.php            # Careers page
├── privacy-policy.php     # Privacy policy
├── terms.php              # Terms & conditions
├── 404.php                # 404 error page
├── config.php             # Database & SMTP configuration
├── functions.php          # Helper functions
├── .htaccess              # URL rewriting & security
├── database_schema.sql    # MySQL database schema
├── seed_data.sql          # Sample data
├── includes/
│   ├── header.php         # Header template
│   ├── navbar.php         # Navigation bar
│   └── footer.php         # Footer template
├── api/
│   └── contact-handler.php # Contact form API
└── assets/
    ├── css/
    │   └── styles.css     # Custom CSS
    ├── js/
    │   └── main.js        # Custom JavaScript
    └── images/            # Image assets
```

## 🛠️ Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher  
- Apache/Nginx web server
- mod_rewrite enabled (Apache)

### Step 1: Database Setup

1. Create MySQL database:
```bash
mysql -u root -p
```

```sql
CREATE DATABASE hashcodelab_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Import schema:
```bash
mysql -u root -p hashcodelab_db < database_schema.sql
```

3. Import seed data:
```bash
mysql -u root -p hashcodelab_db < seed_data.sql
```

### Step 2: Configuration

1. **Edit `config.php`** and update:

```php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'hashcodelab_db');
define('DB_USER', 'your_mysql_username');     // Change this
define('DB_PASS', 'your_mysql_password');     // Change this

// SMTP Email Configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');          // Change this
define('SMTP_PASSWORD', 'your-app-password');         // Change this
define('SMTP_FROM_EMAIL', 'your-email@gmail.com');    // Change this
define('ADMIN_EMAIL', 'admin@hashcodelab.com');       // Change this

// Site Configuration
define('SITE_URL', 'http://localhost/php-website');   // Change this
```

2. **For Gmail SMTP**:
   - Enable 2-Factor Authentication
   - Generate App Password: https://myaccount.google.com/security
   - Use the 16-character app password in `SMTP_PASSWORD`

### Step 3: File Permissions

```bash
chmod 755 /path/to/php-website
chmod 644 /path/to/php-website/*.php
chmod 644 /path/to/php-website/.htaccess
```

### Step 4: Web Server Setup

**For Apache (with mod_rewrite)**:
The `.htaccess` file is already configured for clean URLs.

**For Nginx**, add to your server block:
```nginx
location / {
    try_files $uri $uri/ $uri.php?$query_string;
}

location ~ \\.php$ {
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
}
```

### Step 5: Test Installation

1. Navigate to: `http://localhost/php-website`
2. Test contact form (requires SMTP configuration)
3. Browse all pages

## 📧 Email Configuration

### Gmail Setup (Recommended)

1. **Enable 2-Factor Authentication**:
   - Go to Google Account → Security
   - Enable 2-Step Verification

2. **Generate App Password**:
   - Visit: https://myaccount.google.com/security
   - Click "2-Step Verification" → "App passwords"
   - Select "Mail" and generate password
   - Copy the 16-character password

3. **Update config.php**:
```php
define('SMTP_USER', 'youremail@gmail.com');
define('SMTP_PASSWORD', 'your-16-char-app-password');
define('ADMIN_EMAIL', 'admin@hashcodelab.com');
```

### Alternative: SendGrid

```php
define('SMTP_HOST', 'smtp.sendgrid.net');
define('SMTP_PORT', 587);
define('SMTP_USER', 'apikey');
define('SMTP_PASSWORD', 'your-sendgrid-api-key');
```

### Alternative: Mailgun

```php
define('SMTP_HOST', 'smtp.mailgun.org');
define('SMTP_PORT', 587);
define('SMTP_USER', 'postmaster@your-domain.mailgun.org');
define('SMTP_PASSWORD', 'your-mailgun-password');
```

## 🗄️ Database Management

### View Data

```bash
mysql -u root -p hashcodelab_db

# View contact queries
SELECT * FROM contact_queries;

# View projects
SELECT * FROM projects;

# View blog posts
SELECT * FROM blog_posts;

# View testimonials
SELECT * FROM testimonials;
```

### Backup Database

```bash
mysqldump -u root -p hashcodelab_db > backup.sql
```

### Restore Database

```bash
mysql -u root -p hashcodelab_db < backup.sql
```

## 🎨 Customization

### Update Company Info

1. **Logo**: Update in `includes/navbar.php` and `includes/footer.php`
2. **Contact Details**: Edit `includes/footer.php` and `contact.php`
3. **Social Links**: Update in `includes/footer.php`
4. **WhatsApp Number**: Edit `includes/footer.php` (line with wa.me)

### Add New Service

1. Add entry to services array in `index.php`
2. Create corresponding case in `services.php`

### Add New Blog Post

```sql
INSERT INTO blog_posts (id, title, slug, excerpt, content, category, author, image, published_date, tags)
VALUES (UUID(), 'Your Title', 'your-slug', 'Excerpt...', 'Full content...', 'Category', 'Author Name', 'image-url', NOW(), '["tag1", "tag2"]');
```

### Add New Project

```sql
INSERT INTO projects (id, title, slug, category, description, client, technologies, image, images, problem, solution, results, testimonial)
VALUES (UUID(), 'Project Title', 'project-slug', 'Category', 'Description...', 'Client Name', '["Tech1", "Tech2"]', 'image-url', '["img1", "img2"]', 'Problem...', 'Solution...', 'Results...', 'Testimonial...');
```

## 🔒 Security Features

- Input validation & sanitization
- SQL injection prevention (PDO with prepared statements)
- XSS protection
- CSRF protection (form tokens recommended for production)
- Secure password hashing (if adding user authentication)
- File upload restrictions
- Directory browsing disabled
- Sensitive files protected via .htaccess

## 📱 Pages Overview

### Home (index.php)
- Hero section with CTAs
- Services overview
- Why choose us
- Portfolio showcase (6 projects)
- Stats section
- Testimonials (3 reviews)
- Latest blog posts (3 posts)
- CTA section

### About (about.php)
- Company story
- Mission, vision, values
- Team section
- Company stats

### Services (services.php)
Dynamic page handling 6 services:
- Web Design & Development
- App Development
- Web Applications
- Graphic Design
- SEO & Digital Marketing
- AI Solutions

### Portfolio (portfolio.php)
- All projects listing
- Category filtering
- Project cards with images

### Project Detail (project-detail.php)
- Project overview
- Problem, solution, results
- Technologies used
- Client testimonial
- Project images

### Blog (blog.php)
- All blog posts
- Search functionality
- Category filtering

### Blog Post (blog-post.php)
- Full blog content
- Author info
- Related articles

### Contact (contact.php)
- Contact information
- Interactive form with validation
- Google Maps integration
- Email notifications

### Careers (careers.php)
- Job openings
- Company culture
- Application form

### Privacy Policy & Terms
- Complete legal pages

## 🧪 Testing

### Test Contact Form

1. Fill out all required fields
2. Ensure message is 50+ characters
3. Check privacy policy checkbox
4. Submit and verify:
   - Success message with Reference ID
   - Entry in database
   - Admin email received
   - Client email received

### Test Database Connection

Create a test file `test-db.php`:
```php
<?php
require_once 'config.php';
echo "Database connection successful!";
?>
```

## 🚀 Deployment

### Production Checklist

1. **Security**:
   - [ ] Disable error display: `ini_set('display_errors', 0);`
   - [ ] Update SITE_URL to production domain
   - [ ] Use strong database passwords
   - [ ] Add CSRF protection to forms
   - [ ] Enable HTTPS/SSL
   - [ ] Set secure file permissions

2. **Performance**:
   - [ ] Enable caching
   - [ ] Optimize images
   - [ ] Minify CSS/JS
   - [ ] Enable Gzip compression

3. **Configuration**:
   - [ ] Update config.php with production values
   - [ ] Test SMTP email delivery
   - [ ] Verify database connection
   - [ ] Test all forms and functionality

## 📞 Support

For questions or issues:
- Check logs: PHP error log, MySQL error log
- Review database connections
- Verify SMTP settings
- Ensure file permissions are correct

## ✨ Features Summary

✅ Complete 12+ page website
✅ Working contact form with email notifications
✅ Portfolio and blog systems
✅ Responsive design (mobile, tablet, desktop)
✅ Modern UI with Tailwind CSS
✅ SEO optimized
✅ Database driven content
✅ WhatsApp integration
✅ Cookie consent banner
✅ Clean URLs (.htaccess)
✅ Email validation
✅ Form security
✅ Easy customization

---

**Built with PHP, MySQL, HTML, CSS, and JavaScript**

© 2025 HashCodeLab. All rights reserved.
