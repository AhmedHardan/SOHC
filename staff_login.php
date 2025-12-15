<?php 
$title = "Staff login - Salalah Oasis Hospital";

include ('includes/header.php');  
include ('includes/nav.php');
?>
<body> 

<div class="login-container"> 
    <h1>Staff Login</h1>

    <form action="process_staff_login.php" method="post"> 
        <label for="staffusername">Username:</label>
        <input type="text" id="staffusername" name="staffusername" required><br>
        <label for="staffpassword">Password:</label>
        <input type="password" id="staffpassword" name="staffpassword" required><br>
        <input type="submit" name="login" value="Login">

        
    </form>
</div>



<?php 
include ('includes/footer.php');
?>
</body>