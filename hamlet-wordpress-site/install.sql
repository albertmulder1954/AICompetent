-- Hamlet WordPress Database Setup
-- Run this script to create the database and user for the Hamlet WordPress site

-- Create database
CREATE DATABASE IF NOT EXISTS hamlet_wordpress_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user
CREATE USER IF NOT EXISTS 'hamlet_user'@'localhost' IDENTIFIED BY 'hamlet_password_2024';

-- Grant privileges
GRANT ALL PRIVILEGES ON hamlet_wordpress_db.* TO 'hamlet_user'@'localhost';

-- Flush privileges
FLUSH PRIVILEGES;

-- Show confirmation
SELECT 'Database hamlet_wordpress_db created successfully!' as message;
SELECT 'User hamlet_user created successfully!' as message;
SELECT 'Privileges granted successfully!' as message;