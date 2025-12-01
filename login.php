<?php 
$title = "Login - Salalah Oasis Hospital";
include ('includes/header.php');  
include ('includes/nav.php');
?>


<div class="login-container"> 
    <h1>Patient Login</h1>

    <form action="process_login.php" method="post"> 
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</div>


<?php 
include ('includes/footer.php');
?>