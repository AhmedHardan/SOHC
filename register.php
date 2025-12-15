<?php 
$title = "Home Page";
include ('includes/header.php');  
include ('includes/nav.php');


?>




<div class="login-container"> 
    <h1>Patient Register</h1>

    <form action="add_patient.php" method="post"> 
        <label for="fname">First name </label>
        <input type="text" id="fname" name="fname" required><br>

         <label for="sname">Second name </label>
        <input type="text" id="sname" name="sname" required><br>

        <label for="gender">Gender</label>
         <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="mobile">Mobile number</label>
        <input type="number" id="mobile" name="mobile" required><br>

         <label for="nid">National ID</label>
        <input type="number" id="nid" name="nid" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>

        

        <input type="submit" value="Register" name="register">

        <a href="register.php">  <h2>New User?</h2>   </a>
    </form>
</div>



<?php 


include ('includes/footer.php');
?>