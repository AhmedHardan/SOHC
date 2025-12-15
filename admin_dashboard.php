<?php
session_start();

// Protect admin page
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

include 'includes/header.php';
include 'includes/nav.php';
?>

<div class="login-container">
    <h2>Admin Dashboard</h2>

    <p>Welcome, <?php echo htmlspecialchars($_SESSION['staff_username']); ?></p>

    <ul style="list-style:none; padding:0;">
        <li><a href="admin-add-appointment.php">➕ Add Appointment</a></li>
        <li><a href="admin-view-appointments.php">📋 View Appointments</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
