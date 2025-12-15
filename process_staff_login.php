<?php
session_start();
include 'includes/dbconnect.php';

if (isset($_POST['login'])) {

    $username = $_POST['staffusername'];
    $password = $_POST['staffpassword'];

    // Get staff by username
    $query = "SELECT * FROM staff WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check password
    if ($staff && password_verify($password, $staff['password_hash'])) {

        // Create staff session
        $_SESSION['staff'] = true;
        $_SESSION['staff_username'] = $staff['username'];

        // Redirect to admin dashboard
        header("Location: admin-dashboard.php");
        exit;

    } else {
        header("Location: staff_login.php?error=1");
        exit;
    }
}
