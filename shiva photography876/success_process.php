<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['razorpay_payment_id'])) {
    $payment_id = $_POST['razorpay_payment_id'];
    $booking_id = $_POST['booking_id'];

    try {
        $stmt = $pdo->prepare("UPDATE bookings SET payment_status = 'paid', razorpay_payment_id = ? WHERE id = ?");
        $stmt->execute([$payment_id, $booking_id]);
        header("Location: success.html");
        exit();
    } catch (PDOException $e) {
        header("Location: success.html?error=db");
        exit();
    }
} else {
    header("Location: success.html");
    exit();
}
?>
