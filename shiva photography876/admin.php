<?php
session_start();
require_once 'db.php';

// Access Control
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch Bookings
try {
    $stmt = $pdo->query("SELECT * FROM bookings ORDER BY booking_date DESC");
    $bookings = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Shiva Photography</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .admin-section { padding-top: 120px; }
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; background: #111; color: #fff; border-radius: 8px; overflow: hidden; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #333; }
        th { background: var(--primary); color: #000; font-weight: 600; text-transform: uppercase; font-size: 0.8rem; }
        tr:hover { background: #1a1a1a; }
        .status-paid { color: #25d366; font-weight: 600; }
        .status-pending { color: #f44336; font-weight: 600; }
        .logout-btn { background: #f44336; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; font-size: 0.8rem; float: right; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php" class="logo">SHIVA ADMIN</a>
        <ul>
            <li><a href="index.php">View Website</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="section admin-section">
        <div class="section-title">
            <span>Client Requests</span>
            <h2>Booking Dashboard</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Event Date</th>
                    <th>Message</th>
                    <th>Payment</th>
                    <th>Date Booked</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bookings as $b): ?>
                <tr>
                    <td><?php echo $b['id']; ?></td>
                    <td><?php echo htmlspecialchars($b['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($b['email']); ?></td>
                    <td><?php echo htmlspecialchars($b['phone']); ?></td>
                    <td><?php echo $b['event_date']; ?></td>
                    <td><small><?php echo htmlspecialchars($b['message']); ?></small></td>
                    <td>
                        <span class="<?php echo ($b['payment_status'] == 'paid' ? 'status-paid' : 'status-pending'); ?>">
                            <?php echo strtoupper($b['payment_status']); ?>
                        </span>
                    </td>
                    <td><?php echo date('Y-m-d H:i', strtotime($b['booking_date'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
