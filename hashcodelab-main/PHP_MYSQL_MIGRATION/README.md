# PHP + MySQL Migration Guide for HashCodeLab

## Overview
This directory contains files to help you migrate from FastAPI + MongoDB to PHP + MySQL.

## Files Included
1. `database_schema.sql` - MySQL database schema
2. `contact_form.php` - PHP contact form handler
3. `README.md` - This file with setup instructions

## Setup Instructions

### Step 1: Database Setup

1. **Create MySQL Database**
   ```bash
   mysql -u root -p
   ```

2. **Import the schema**
   ```bash
   mysql -u root -p < database_schema.sql
   ```

3. **Create a database user** (recommended for security)
   ```sql
   CREATE USER 'hashcodelab_user'@'localhost' IDENTIFIED BY 'your_secure_password';
   GRANT ALL PRIVILEGES ON hashcodelab_db.* TO 'hashcodelab_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

### Step 2: PHP Configuration

1. **Update database credentials in `contact_form.php`**
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'hashcodelab_user');
   define('DB_PASS', 'your_secure_password');
   define('DB_NAME', 'hashcodelab_db');
   ```

2. **Update SMTP settings**
   ```php
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_PORT', 587);
   define('SMTP_USER', 'your-email@gmail.com');
   define('SMTP_PASS', 'your-app-password');
   define('ADMIN_EMAIL', 'admin@hashcodelab.com');
   ```

### Step 3: Install PHPMailer (Recommended)

For better email functionality, use PHPMailer:

```bash
composer require phpmailer/phpmailer
```

Then uncomment the PHPMailer section in `contact_form.php`.

### Step 4: Upload Files

1. Upload `contact_form.php` to your web server
2. Ensure the file has proper permissions (644)
3. Test the endpoint: `https://yourdomain.com/contact_form.php`

### Step 5: Update Frontend

Update your React frontend to point to the new PHP endpoint:

```javascript
// In your Contact.jsx or wherever you handle the form
const API_ENDPOINT = 'https://yourdomain.com/contact_form.php';

const handleSubmit = async (e) => {
  e.preventDefault();
  
  try {
    const response = await axios.post(API_ENDPOINT, formData);
    if (response.data.success) {
      toast.success(`Thank you! Reference ID: ${response.data.id}`);
    }
  } catch (error) {
    toast.error('Failed to submit form');
  }
};
```

## Gmail SMTP Setup

If using Gmail for SMTP:

1. Enable 2-Factor Authentication on your Google account
2. Generate an App Password:
   - Go to: https://myaccount.google.com/security
   - Select "2-Step Verification"
   - At the bottom, select "App passwords"
   - Generate a password for "Mail"
3. Use this app password in your SMTP_PASS setting

## Security Recommendations

1. **SSL Certificate**: Always use HTTPS
2. **Input Validation**: Already implemented in the PHP file
3. **Rate Limiting**: Consider implementing rate limiting to prevent spam
4. **CAPTCHA**: Add Google reCAPTCHA for additional security
5. **Error Logging**: Monitor `php_errors.log` for issues
6. **Database Backups**: Set up regular automated backups

## Testing

1. **Test database connection**:
   ```php
   <?php
   $conn = new mysqli('localhost', 'user', 'pass', 'hashcodelab_db');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
   ?>
   ```

2. **Test form submission**: Use the frontend contact form
3. **Check database**: Verify data is being saved
4. **Check emails**: Confirm both admin and client emails are sent

## Troubleshooting

### Database Connection Issues
- Verify credentials
- Check if MySQL is running
- Ensure user has proper privileges

### Email Not Sending
- Verify SMTP credentials
- Check spam folder
- Review `php_errors.log`
- Try using PHPMailer instead of mail()

### CORS Issues
- Ensure proper CORS headers in PHP file
- Check server configuration

## Additional Features

### View Submissions (Simple Admin Panel)

Create `view_queries.php`:

```php
<?php
// Simple admin panel to view submissions
require_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$result = $conn->query("SELECT * FROM contact_queries ORDER BY submission_date DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['full_name']) . "</h3>";
    echo "<p>" . htmlspecialchars($row['email']) . "</p>";
    echo "<p>" . htmlspecialchars($row['message']) . "</p>";
    echo "</div><hr>";
}
?>
```

**Note**: Protect this file with authentication!

## Migration Checklist

- [ ] Database created
- [ ] Schema imported
- [ ] Database user created
- [ ] PHP file configured
- [ ] SMTP settings updated
- [ ] Files uploaded to server
- [ ] Frontend updated with new endpoint
- [ ] Form tested and working
- [ ] Emails being received
- [ ] Data saving to database
- [ ] SSL certificate installed
- [ ] Error logging configured

## Support

For issues or questions:
- Email: support@hashcodelab.com
- Check PHP error logs
- Review MySQL error logs

## Notes

- The current FastAPI + MongoDB implementation is fully functional
- This PHP + MySQL version provides an alternative for traditional hosting
- Both versions can coexist during transition period
- Consider your hosting environment when choosing which to use
