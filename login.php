<?php 
$title = "Login - Salalah Oasis Hospital";

include ('includes/header.php');  
include ('includes/nav.php');
?>
<body> 

<div class="login-container"> 
    <h1>Patient Login</h1>

    <form action="login_code.php" method="post"> 
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
       <input type="submit" name="login" value="Login">
        <a href="register.php">  New User?  </a>
        <a href="forgot_password.php">  Forgot Password?   </a>
    </form>
</div>



<?php 
include ('includes/footer.php');
?>
</body>