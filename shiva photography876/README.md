# Shiva Photography Portfolio Setup Instructions

Welcome to the complete professional photography portfolio for "Shiva Photography". Follow these steps to get your website up and running.

## Prerequisites
- **Local Server**: XAMPP, WAMP, or any PHP/MySQL environment.
- **MySQL Client**: phpMyAdmin or MySQL Workbench.
- **Razorpay Account**: To receive payments (Razorpay API Keys required).

## Step 1: Database Configuration
1. Open your MySQL client (like phpMyAdmin).
2. Create a new database named `shiva_photography`.
3. Import the `database.sql` file provided in the root directory.

## Step 2: Database Connection
1. Open `db.php`.
2. Update the `$user` and `$pass` variables if your local MySQL setup has a custom username or password (default is `root` and empty).

## Step 3: Razorpay Integration
1. Open `payment.php`.
2. Find the line `data-key="rzp_test_YOUR_KEY_ID"`.
3. Replace `rzp_test_YOUR_KEY_ID` with your actual **Test Key ID** or **Live Key ID** from the Razorpay dashboard.

## Step 4: Admin Access
1. To access the admin panel, you first need to register a user via `signup.php`.
2. Once registered, manually change the `role` from `'client'` to `'admin'` in the `users` table via phpMyAdmin.
3. Use the admin account to log in and visit the `admin.php` page.

## Step 5: Email Notifications
The `booking_process.php` file uses the basic PHP `mail()` function. Ensure your local server is configured to send emails (e.g., using `sendmail` or a SMTP plugin) for this to work.

## Features Included
- **Fullscreen Hero**: Stunning black luxury design with dark overlay.
- **Portfolio Grid**: Premium image display with modern hover animations.
- **Booking System**: Secure form with database storage.
- **WhatsApp**: One-click confirmation with pre-filled booking details.
- **Payments**: Integrated Razorpay advance payment button.
- **Admin Panel**: Centralized location to manage all shoots.

&copy; 2026 Shiva Photography
