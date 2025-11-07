<?php
require_once '../config.php';  
require_once '../functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;

// Validate required fields
$required = ['full_name', 'email', 'service_interested', 'message', 'agree_privacy'];
foreach ($required as $field) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required']);
        exit;
    }
}

// Validate email
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Validate message length
if (strlen($data['message']) < 50) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Message must be at least 50 characters']);
    exit;
}

// Validate privacy agreement
if (!$data['agree_privacy'] || $data['agree_privacy'] === 'false') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'You must agree to the privacy policy']);
    exit;
}

// Sanitize data
$sanitizedData = [
    'full_name' => sanitize($data['full_name']),
    'email' => sanitize($data['email']),
    'phone' => isset($data['phone']) ? sanitize($data['phone']) : null,
    'company_name' => isset($data['company_name']) ? sanitize($data['company_name']) : null,
    'service_interested' => sanitize($data['service_interested']),
    'budget' => isset($data['budget']) ? sanitize($data['budget']) : null,
    'message' => sanitize($data['message']),
    'how_heard' => isset($data['how_heard']) ? sanitize($data['how_heard']) : null,
    'agree_privacy' => true
];

// Save to database
try {
    $queryId = saveContactQuery($sanitizedData);
    
    if ($queryId) {
        // Send email notification to admin
        $adminSubject = "New Contact Form Submission - HashCodeLab";
        $adminBody = "
        <html>
        <head><style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); color: white; padding: 20px; text-align: center; }
            .content { background: #f9fafb; padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #1e40af; }
            .value { color: #374151; }
        </style></head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Contact Query Received</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <span class='label'>Reference ID:</span>
                        <span class='value'>{$queryId}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Name:</span>
                        <span class='value'>{$sanitizedData['full_name']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Email:</span>
                        <span class='value'>{$sanitizedData['email']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Phone:</span>
                        <span class='value'>{$sanitizedData['phone']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Company:</span>
                        <span class='value'>{$sanitizedData['company_name']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Service Interested:</span>
                        <span class='value'>{$sanitizedData['service_interested']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Budget:</span>
                        <span class='value'>{$sanitizedData['budget']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>How They Heard:</span>
                        <span class='value'>{$sanitizedData['how_heard']}</span>
                    </div>
                    <div class='field'>
                        <span class='label'>Message:</span>
                        <div class='value'>{$sanitizedData['message']}</div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Send admin email
        sendEmail(ADMIN_EMAIL, $adminSubject, $adminBody, true);
        
        // Send acknowledgment email to client
        $clientSubject = "Thank you for contacting HashCodeLab";
        $clientBody = "
        <html>
        <head><style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
        </style></head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Thank You for Contacting Us!</h2>
                </div>
                <div class='content'>
                    <p>Dear {$sanitizedData['full_name']},</p>
                    <p>Thank you for reaching out to HashCodeLab. We have received your inquiry and our team will review it shortly.</p>
                    <p><strong>Your Reference ID:</strong> {$queryId}</p>
                    <p>We aim to respond to all inquiries within 24 hours during business days.</p>
                    <p>Best regards,<br>The HashCodeLab Team</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Send client email
        sendEmail($sanitizedData['email'], $clientSubject, $clientBody, true);
        
        echo json_encode([
            'success' => true,
            'message' => 'Thank you! Your query has been submitted successfully.',
            'id' => $queryId
        ]);
    } else {
        throw new Exception('Failed to save contact query');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred. Please try again later.',
        'error' => $e->getMessage()
    ]);
}
?>