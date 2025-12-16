<?php
session_start();

// Protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'includes/dbconnect.php';
include 'includes/header.php';
include 'includes/nav.php';

$username = $_SESSION['username'];

if (isset($_POST['change'])) {

    $new_password = $_POST['new_password'];

    // Hash new password
    $hashed = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password
    $query = "UPDATE patients SET password_hash = ? WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$hashed, $username]);

    header("Location: user-home.php?password=changed");
    exit;
}
?>

<div class="login-container">
    <h2>Change Password</h2>

    <form method="POST">
        <label>New Password</label>
        <input type="password" name="new_password" required>

        <input type="submit" name="change" value="Change Password">
    </form>

    <p style="margin-top:10px;">
        <a href="user-home.php">Back to Profile</a>
    </p>
</div>

<?php include 'includes/footer.php'; ?>
