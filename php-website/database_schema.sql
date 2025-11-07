-- HashCodeLab Database Schema for MySQL
-- Created for PHP/MySQL Migration

CREATE DATABASE IF NOT EXISTS hashcodelab_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE hashcodelab_db;

-- Contact Queries Table
CREATE TABLE IF NOT EXISTS contact_queries (
    id VARCHAR(36) PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    company_name VARCHAR(255),
    service_interested VARCHAR(100) NOT NULL,
    budget VARCHAR(50),
    message TEXT NOT NULL,
    how_heard VARCHAR(100),
    agree_privacy BOOLEAN NOT NULL DEFAULT FALSE,
    submission_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    status VARCHAR(20) DEFAULT 'new',
    INDEX idx_email (email),
    INDEX idx_submission_date (submission_date),
    INDEX idx_status (status)
) ENGINE=InnoDB;

-- Blog Posts Table
CREATE TABLE IF NOT EXISTS blog_posts (
    id VARCHAR(36) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT NOT NULL,
    category VARCHAR(100),
    author VARCHAR(100),
    image VARCHAR(500),
    published_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    tags JSON,
    INDEX idx_slug (slug),
    INDEX idx_category (category),
    INDEX idx_published_date (published_date)
) ENGINE=InnoDB;

-- Projects Table
CREATE TABLE IF NOT EXISTS projects (
    id VARCHAR(36) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category VARCHAR(100),
    description TEXT,
    client VARCHAR(255),
    technologies JSON,
    image VARCHAR(500),
    images JSON,
    problem TEXT,
    solution TEXT,
    results TEXT,
    testimonial TEXT,
    INDEX idx_slug (slug),
    INDEX idx_category (category)
) ENGINE=InnoDB;

-- Testimonials Table
CREATE TABLE IF NOT EXISTS testimonials (
    id VARCHAR(36) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    position VARCHAR(255),
    content TEXT NOT NULL,
    image VARCHAR(500),
    rating INT DEFAULT 5,
    INDEX idx_rating (rating)
) ENGINE=InnoDB;
