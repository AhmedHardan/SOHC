<?php
//1 - start session
session_start();

//2 - protect page (staff only)
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

//3 - include database connection
include 'includes/dbconnect.php';

if (isset($_POST['add'])) {   //4 - check if add button clicked

    //5 - get values from POST
    $patient_username = $_POST['patient_username'];
    $doctor_name = $_POST['doctor_name'];
    $department = $_POST['department'];
    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];

    //6 - prepare SQL insert query
    $query = "INSERT INTO appointments 
              (patient_username, doctor_name, department, appointment_date, status)
              VALUES (?, ?, ?, ?, ?)";

    //7 - prepare statement
    $stmt = $pdo->prepare($query);

    //8 - execute statement
    $stmt->execute([
        $patient_username,
        $doctor_name,
        $department,
        $appointment_date,
        $status
    ]);

    //9 - redirect to view appointments
    header("Location: admin-view-appointments.php");
    exit;
}
?>
