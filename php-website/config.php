<?php
/**
 * Configuration File for HashCodeLab Website
 * Contains database connection and site settings
 */

// Error reporting for development (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'hashcodelab_db');
define('DB_USER', 'root');  // Change to your MySQL username
define('DB_PASS', '');      // Change to your MySQL password
define('DB_CHARSET', 'utf8mb4');

// SMTP Email Configuration
define('SMTP_HOST', 'smtp.gmail.com');  // e.g., smtp.gmail.com
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');  // Your email
define('SMTP_PASSWORD', 'your-app-password');  // Your app password
define('SMTP_FROM_EMAIL', 'your-email@gmail.com');
define('SMTP_FROM_NAME', 'HashCodeLab');
define('ADMIN_EMAIL', 'admin@hashcodelab.com');  // Where contact form emails go

// Site Configuration
define('SITE_NAME', 'HashCodeLab');
define('SITE_URL', 'http://localhost');  // Change to your domain
define('SITE_DESCRIPTION', 'Professional IT Services Company');

// Database Connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Helper Functions
function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

?>