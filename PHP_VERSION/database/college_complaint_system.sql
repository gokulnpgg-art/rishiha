-- College Complaint System Database Schema for MySQL
-- To be used with XAMPP

CREATE DATABASE IF NOT EXISTS `college_complaint_system`;
USE `college_complaint_system`;

-- Users table (students, faculty, staff)
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `phone` VARCHAR(15),
    `login_id` VARCHAR(50) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `area_name` VARCHAR(255),
    `gender` ENUM('Male', 'Female', 'Trans-Gender') NOT NULL,
    `address` TEXT,
    `user_type` ENUM('Student', 'Faculty', 'Staff') DEFAULT 'Student',
    `status` ENUM('Active', 'Inactive') DEFAULT 'Active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Admin users table
CREATE TABLE IF NOT EXISTS `admin_users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `role` ENUM('Super Admin', 'Admin', 'Authority') DEFAULT 'Admin',
    `status` ENUM('Active', 'Inactive') DEFAULT 'Active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Complaint categories
CREATE TABLE IF NOT EXISTS `complaint_categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `status` ENUM('Active', 'Inactive') DEFAULT 'Active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Complaints table
CREATE TABLE IF NOT EXISTS `complaints` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `category_id` INT,
    `title` VARCHAR(500) NOT NULL,
    `description` TEXT NOT NULL,
    `priority` ENUM('Low', 'Medium', 'High', 'Critical') DEFAULT 'Medium',
    `status` ENUM('Submitted', 'In Progress', 'Under Review', 'Resolved', 'Closed', 'Rejected') DEFAULT 'Submitted',
    `assigned_to` INT NULL,
    `attachment` VARCHAR(500) NULL,
    `complaint_date` DATE NOT NULL,
    `expected_resolution_date` DATE NULL,
    `actual_resolution_date` DATE NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`category_id`) REFERENCES `complaint_categories`(`id`) ON SET NULL,
    FOREIGN KEY (`assigned_to`) REFERENCES `admin_users`(`id`) ON SET NULL
);

-- Complaint replies/responses
CREATE TABLE IF NOT EXISTS `complaint_replies` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `complaint_id` INT NOT NULL,
    `reply_by` INT NOT NULL,
    `reply_by_type` ENUM('User', 'Admin') NOT NULL,
    `reply_text` TEXT NOT NULL,
    `attachment` VARCHAR(500) NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`complaint_id`) REFERENCES `complaints`(`id`) ON DELETE CASCADE
);

-- Feedback table
CREATE TABLE IF NOT EXISTS `feedback` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `designation` VARCHAR(255),
    `company` VARCHAR(255),
    `area_of_work` VARCHAR(255),
    `address` TEXT,
    `city` VARCHAR(100),
    `state` VARCHAR(100),
    `country` VARCHAR(100),
    `pincode` VARCHAR(10),
    `email` VARCHAR(255),
    `telephone` VARCHAR(20),
    `fax` VARCHAR(20),
    `query_comment` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Notifications table
CREATE TABLE IF NOT EXISTS `notifications` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(500) NOT NULL,
    `message` TEXT NOT NULL,
    `target_audience` ENUM('All', 'Students', 'Faculty', 'Staff', 'Specific') DEFAULT 'All',
    `target_user_id` INT NULL,
    `created_by` INT NOT NULL,
    `is_active` BOOLEAN DEFAULT TRUE,
    `priority` ENUM('Low', 'Medium', 'High') DEFAULT 'Medium',
    `expires_at` DATE NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`created_by`) REFERENCES `admin_users`(`id`),
    FOREIGN KEY (`target_user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- User sessions for tracking
CREATE TABLE IF NOT EXISTS `user_sessions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NULL,
    `admin_id` INT NULL,
    `session_id` VARCHAR(255) NOT NULL,
    `ip_address` VARCHAR(45),
    `user_agent` TEXT,
    `login_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `logout_time` TIMESTAMP NULL,
    `is_active` BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`admin_id`) REFERENCES `admin_users`(`id`) ON DELETE CASCADE
);

-- Insert default admin user
INSERT INTO `admin_users` (`username`, `password`, `name`, `email`, `role`) VALUES
('admin', MD5('admin123'), 'System Administrator', 'admin@college.edu', 'Super Admin');

-- Insert default complaint categories
INSERT INTO `complaint_categories` (`category_name`, `description`) VALUES
('Academic Issues', 'Issues related to courses, grades, faculty teaching'),
('Infrastructure', 'Issues related to building, facilities, maintenance'),
('Hostel/Accommodation', 'Issues related to hostel facilities and services'),
('Canteen/Food', 'Issues related to food quality and canteen services'),
('Library', 'Issues related to library services and resources'),
('IT/Technology', 'Issues related to computer labs, wifi, online services'),
('Administrative', 'Issues related to office procedures and staff'),
('Financial', 'Issues related to fees, scholarships, financial aid'),
('Sports/Recreation', 'Issues related to sports facilities and activities'),
('Other', 'Any other issues not covered in above categories');

-- Create indexes for better performance
CREATE INDEX idx_complaints_user_id ON complaints(user_id);
CREATE INDEX idx_complaints_status ON complaints(status);
CREATE INDEX idx_complaints_date ON complaints(complaint_date);
CREATE INDEX idx_users_login_id ON users(login_id);
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_complaint_replies_complaint_id ON complaint_replies(complaint_id);
CREATE INDEX idx_notifications_target ON notifications(target_audience, is_active);
