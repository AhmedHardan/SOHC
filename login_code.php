<?php
session_start();
include 'includes/dbconnect.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Get user record by username
    $query = "SELECT * FROM patients WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check login
    if ($user && password_verify($password, $user['password_hash'])) {

        // Create SESSION variables (as required by lecture)
        $_SESSION['username'] = $user['username'];
        $_SESSION['patient']  = true;

        // Redirect to user home page
        header("Location: user-home.php");
        exit;

    } else {
        // Login failed
        header("Location: login.php?error=1");
        exit;
    }
}
?>
