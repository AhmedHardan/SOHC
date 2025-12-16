<?php

session_start();

include 'includes/dbconnect.php';

if (isset($_POST["login"])) {   

    
    $username = $_POST['username'];
    $password = $_POST['password']; // getting the values from login form

    // getting the username record where the username matches 
    // "?" is placeholder for prepared statement to prevent SQL injection
    $query = "SELECT * FROM patients WHERE username = ?";

    // prepare the query to send data to database 
    $stmt = $pdo->prepare($query);

// sending the values to database 
    $stmt->execute([$username]);

    // Fetch the user record[ user is all the record of that username]
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check login credentials
    // $password is the plain text the user entered and 
    // $user['password_hash'] is the hashed password stored in database
    // password_verify function checks if the plain text password matches the hash
    if ($user && password_verify($password, $user['password_hash'])) {

        // Create session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['patient']  = true;

        // 11- Redirect to user home page
        header("Location: user-home.php");
        exit;

    } else {
        // 12- Login failed
        header("Location: login.php?error=1");
        exit;
    }
}
?>

