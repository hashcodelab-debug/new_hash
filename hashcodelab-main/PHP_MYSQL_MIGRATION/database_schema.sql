-- HashCodeLab Database Schema for MySQL
-- Run this SQL script to create the database and tables

CREATE DATABASE IF NOT EXISTS hashcodelab_db;
USE hashcodelab_db;

-- Contact Queries Table
CREATE TABLE IF NOT EXISTS contact_queries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    query_id VARCHAR(50) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    company_name VARCHAR(150),
    service_interested VARCHAR(100) NOT NULL,
    budget VARCHAR(50),
    message TEXT NOT NULL,
    how_heard VARCHAR(100),
    agree_privacy BOOLEAN NOT NULL DEFAULT 1,
    submission_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    status ENUM('new', 'in_progress', 'resolved') DEFAULT 'new',
    admin_notes TEXT,
    INDEX idx_email (email),
    INDEX idx_date (submission_date),
    INDEX idx_status (status),
    INDEX idx_query_id (query_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Posts Table (Optional - if you want to manage blog in MySQL)
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id VARCHAR(50) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT,
    content LONGTEXT NOT NULL,
    category VARCHAR(100),
    author VARCHAR(100),
    image VARCHAR(255),
    published_date DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_slug (slug),
    INDEX idx_category (category),
    INDEX idx_published (published_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Projects Table (Optional - if you want to manage portfolio in MySQL)
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    category VARCHAR(100),
    description TEXT,
    client VARCHAR(150),
    image VARCHAR(255),
    problem TEXT,
    solution TEXT,
    results TEXT,
    testimonial TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_slug (slug),
    INDEX idx_category (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Project Technologies Table
CREATE TABLE IF NOT EXISTS project_technologies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50) NOT NULL,
    technology VARCHAR(100) NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE,
    INDEX idx_project (project_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Testimonials Table (Optional)
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    testimonial_id VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    company VARCHAR(150),
    position VARCHAR(100),
    content TEXT NOT NULL,
    image VARCHAR(255),
    rating INT DEFAULT 5,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_testimonial_id (testimonial_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;