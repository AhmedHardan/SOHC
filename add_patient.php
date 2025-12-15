<?php
session_start();
include 'includes/dbconnect.php';

if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

if (isset($_POST['register'])) {

    $fname    = $_POST['fname'];
    $sname    = $_POST['sname'];
    $gender   = $_POST['gender'];
    $username = $_POST['username'];
    $mobile   = $_POST['mobile'];
    $nid      = $_POST['nid'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO patients
    (first_name, second_name, gender, username, mobile_number, national_id, password_hash)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $fname,
        $sname,
        $gender,
        $username,
        $mobile,
        $nid,
        $password
    ]);

    header("Location: index.php?success=1");
    exit;
}
?>
