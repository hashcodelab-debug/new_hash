<?php
/**
 * Helper Functions for HashCodeLab Website
 */

require_once 'config.php';

/**
 * Get all blog posts
 */
function getBlogPosts($limit = null) {
    global $pdo;
    $sql = "SELECT * FROM blog_posts ORDER BY published_date DESC";
    if ($limit) {
        $sql .= " LIMIT :limit";
    }
    $stmt = $pdo->prepare($sql);
    if ($limit) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Get a single blog post by slug
 */
function getBlogPostBySlug($slug) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE slug = :slug");
    $stmt->execute(['slug' => $slug]);
    return $stmt->fetch();
}

/**
 * Get all projects
 */
function getProjects($limit = null) {
    global $pdo;
    $sql = "SELECT * FROM projects";
    if ($limit) {
        $sql .= " LIMIT :limit";
    }
    $stmt = $pdo->prepare($sql);
    if ($limit) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Get a single project by slug
 */
function getProjectBySlug($slug) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE slug = :slug");
    $stmt->execute(['slug' => $slug]);
    return $stmt->fetch();
}

/**
 * Get all testimonials
 */
function getTestimonials($limit = null) {
    global $pdo;
    $sql = "SELECT * FROM testimonials ORDER BY rating DESC";
    if ($limit) {
        $sql .= " LIMIT :limit";
    }
    $stmt = $pdo->prepare($sql);
    if ($limit) {
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Save contact form submission
 */
function saveContactQuery($data) {
    global $pdo;
    
    $id = generateUUID();
    $sql = "INSERT INTO contact_queries 
            (id, full_name, email, phone, company_name, service_interested, 
             budget, message, how_heard, agree_privacy, ip_address, status) 
            VALUES 
            (:id, :full_name, :email, :phone, :company_name, :service_interested, 
             :budget, :message, :how_heard, :agree_privacy, :ip_address, 'new')";
    
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        'id' => $id,
        'full_name' => $data['full_name'],
        'email' => $data['email'],
        'phone' => $data['phone'] ?? null,
        'company_name' => $data['company_name'] ?? null,
        'service_interested' => $data['service_interested'],
        'budget' => $data['budget'] ?? null,
        'message' => $data['message'],
        'how_heard' => $data['how_heard'] ?? null,
        'agree_privacy' => $data['agree_privacy'] ? 1 : 0,
        'ip_address' => getClientIP()
    ]);
    
    return $result ? $id : false;
}

/**
 * Send email using PHP mail or SMTP
 */
function sendEmail($to, $subject, $body, $isHTML = true) {
    // For production, use PHPMailer or similar library
    // This is a basic implementation
    $headers = "From: " . SMTP_FROM_NAME . " <" . SMTP_FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: " . SMTP_FROM_EMAIL . "\r\n";
    if ($isHTML) {
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    }
    
    return mail($to, $subject, $body, $headers);
}

/**
 * Format date for display
 */
function formatDate($date) {
    return date('F j, Y', strtotime($date));
}

/**
 * Get current page name
 */
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

/**
 * Check if current page is active
 */
function isActivePage($page) {
    return getCurrentPage() === $page ? 'active' : '';
}

?>