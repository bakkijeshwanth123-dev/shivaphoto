-- Create Database
CREATE DATABASE IF NOT EXISTS shiva_photography;
USE shiva_photography;

-- Users Table for Admin/Client Login
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bookings Table
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    event_date DATE NOT NULL,
    message TEXT,
    payment_status ENUM('pending', 'paid') DEFAULT 'pending',
    razorpay_payment_id VARCHAR(100) NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
