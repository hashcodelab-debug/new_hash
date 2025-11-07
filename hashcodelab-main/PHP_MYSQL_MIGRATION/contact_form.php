<?php
/**
 * HashCodeLab Contact Form Handler
 * PHP + MySQL Implementation
 * 
 * SETUP INSTRUCTIONS:
 * 1. Update database credentials below
 * 2. Update SMTP settings for email functionality
 * 3. Run database_schema.sql to create tables
 * 4. Upload this file to your PHP server
 * 5. Update the frontend API endpoint to point to this file
 */

// Enable error reporting for development (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');

// CORS Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

// ============================================
// DATABASE CONFIGURATION
// ============================================
define('DB_HOST', 'localhost');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
define('DB_NAME', 'hashcodelab_db');

// ============================================
// EMAIL CONFIGURATION
// ============================================
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');
define('ADMIN_EMAIL', 'admin@hashcodelab.com');

// ============================================
// FUNCTIONS
// ============================================

function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
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

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sendEmail($to, $subject, $body) {
    // Using PHPMailer (recommended) or PHP mail() function
    // This is a basic example using mail()
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . SMTP_USER . "\r\n";
    
    return mail($to, $subject, $body, $headers);
    
    // For production, use PHPMailer:
    /*
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;
        
        $mail->setFrom(SMTP_USER, 'HashCodeLab');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        return $mail->send();
    } catch (Exception $e) {
        error_log("Email Error: " . $mail->ErrorInfo);
        return false;
    }
    */
}

// ============================================
// MAIN LOGIC
// ============================================

try {
    // Get JSON input
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    if (!$data) {
        throw new Exception('Invalid JSON data');
    }
    
    // Validate required fields
    $required = ['full_name', 'email', 'service_interested', 'message', 'agree_privacy'];
    foreach ($required as $field) {
        if (empty($data[$field])) {
            throw new Exception(ucfirst(str_replace('_', ' ', $field)) . ' is required');
        }
    }
    
    // Validate email
    if (!validateEmail($data['email'])) {
        throw new Exception('Invalid email address');
    }
    
    // Validate message length
    if (strlen($data['message']) < 50) {
        throw new Exception('Message must be at least 50 characters long');
    }
    
    // Validate privacy agreement
    if (!$data['agree_privacy']) {
        throw new Exception('You must agree to the privacy policy');
    }
    
    // Sanitize inputs
    $full_name = sanitizeInput($data['full_name']);
    $email = sanitizeInput($data['email']);
    $phone = isset($data['phone']) ? sanitizeInput($data['phone']) : null;
    $company_name = isset($data['company_name']) ? sanitizeInput($data['company_name']) : null;
    $service_interested = sanitizeInput($data['service_interested']);
    $budget = isset($data['budget']) ? sanitizeInput($data['budget']) : null;
    $message = sanitizeInput($data['message']);
    $how_heard = isset($data['how_heard']) ? sanitizeInput($data['how_heard']) : null;
    $ip_address = getClientIP();
    $query_id = generateUUID();
    
    // Connect to database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception('Database connection failed');
    }
    
    // Prepare and execute insert statement
    $stmt = $conn->prepare(
        "INSERT INTO contact_queries (query_id, full_name, email, phone, company_name, service_interested, budget, message, how_heard, agree_privacy, ip_address, status) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?, 'new')"
    );
    
    $stmt->bind_param(
        'ssssssssss',
        $query_id,
        $full_name,
        $email,
        $phone,
        $company_name,
        $service_interested,
        $budget,
        $message,
        $how_heard,
        $ip_address
    );
    
    if (!$stmt->execute()) {
        throw new Exception('Failed to save query');
    }
    
    $stmt->close();
    $conn->close();
    
    // Send admin notification email
    $admin_subject = "New Contact Query - " . $service_interested;
    $admin_body = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {$full_name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> " . ($phone ?: 'N/A') . "</p>
        <p><strong>Company:</strong> " . ($company_name ?: 'N/A') . "</p>
        <p><strong>Service Interested:</strong> {$service_interested}</p>
        <p><strong>Budget:</strong> " . ($budget ?: 'N/A') . "</p>
        <p><strong>How Heard:</strong> " . ($how_heard ?: 'N/A') . "</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
        <hr>
        <p><small>Query ID: {$query_id}</small></p>
        <p><small>IP Address: {$ip_address}</small></p>
    </body>
    </html>
    ";
    
    sendEmail(ADMIN_EMAIL, $admin_subject, $admin_body);
    
    // Send client acknowledgment email
    $client_subject = "Thank you for contacting HashCodeLab";
    $client_body = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <h2>Thank you for reaching out!</h2>
        <p>Dear {$full_name},</p>
        <p>We have received your inquiry about <strong>{$service_interested}</strong>.</p>
        <p>Your reference number is: <strong>{$query_id}</strong></p>
        <p>Our team will review your message and get back to you within 24-48 hours.</p>
        <br>
        <p>Best regards,<br>HashCodeLab Team</p>
        <hr>
        <p style='font-size: 12px; color: #666;'>This is an automated message. Please do not reply to this email.</p>
    </body>
    </html>
    ";
    
    sendEmail($email, $client_subject, $client_body);
    
    // Return success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Query submitted successfully',
        'id' => $query_id
    ]);
    
} catch (Exception $e) {
    error_log('Contact Form Error: ' . $e->getMessage());
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>