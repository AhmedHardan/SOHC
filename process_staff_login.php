<?php
session_start();
include 'includes/dbconnect.php';

if (isset($_POST['login'])) {

    $username = $_POST['staffusername'];
    $password = $_POST['staffpassword'];

    $query = "SELECT * FROM staff WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($staff && password_verify($password, $staff['password_hash'])) {

        $_SESSION['staff'] = true;
        $_SESSION['staff_username'] = $staff['username'];

        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "INVALID STAFF LOGIN";
        exit;
    }
}
