<?php
$title = "Delete Appointment - Salalah Oasis Hospital";

//1 - start session
session_start();

//2 - protect page (staff only)
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

//3 - include database connection
include 'includes/dbconnect.php';

//4 - check if appointment id is received
if (isset($_GET['id'])) {

    $appointment_id = $_GET['id'];

    //5 - prepare SQL delete query
    $query = "DELETE FROM appointments WHERE appointment_id = ?";

    //6 - prepare the statement
    $stmt = $pdo->prepare($query);

    //7 - execute the statement
    $stmt->execute([$appointment_id]);

    //8 - redirect back to admin view page
    header("Location: admin-view-appointments.php");
    exit;
}
?>
