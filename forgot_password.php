<?php
$title = "Forgot Password - Salalah Oasis Hospital";
include ('includes/header.php');
include ('includes/nav.php');
?>

<div class="login-container">
    <h1>Forgot Password</h1>

    <form action="reset_password.php" method="post">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" required>

        <input type="submit" name="reset" value="Reset Password">

    </form>

    <p style="margin-top:15px;">
        <a href="staff_login.php">Back to Login</a>
    </p>
</div>

<?php include ('includes/footer.php'); ?>
