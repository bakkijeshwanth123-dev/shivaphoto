<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $event_date = $_POST['event_date'];
    $message = trim($_POST['message']);

    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (full_name, email, phone, event_date, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $phone, $event_date, $message]);
        $booking_id = $pdo->lastInsertId();

        // Email Notification to Admin (Placeholder)
        $to = "admin@shivaphotography.com";
        $subject = "New Booking from $full_name";
        $body = "Name: $full_name\nEmail: $email\nPhone: $phone\nDate: $event_date\nMessage: $message";
        $headers = "From: webmaster@shivaphotography.com";
        
        // mail($to, $subject, $body, $headers); // Uncomment in real server environment

        // Redirect to payment page with details
        header("Location: payment.html?id=$booking_id&name=".urlencode($full_name)."&email=".urlencode($email)."&phone=".urlencode($phone)."&date=".urlencode($event_date));
        exit();

    } catch (PDOException $e) {
        die("Booking failed: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>
