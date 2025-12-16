<?php
//1 - start session
session_start();

//2 - include database connection
include 'includes/dbconnect.php';

//3 - protect page (staff only)
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Appointment</title>
</head>
<body>

<h2>Add Appointment</h2>

<form method="POST" action="process-add-appointment.php">

    Patient Username:<br>
    <input type="text" name="patient_username" required><br><br>

    Doctor Name:<br>
    <input type="text" name="doctor_name" required><br><br>

    Department:<br>
    <input type="text" name="department" required><br><br>

    Appointment Date:<br>
    <input type="date" name="appointment_date" required><br><br>

    Status:<br>
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Approved">Approved</option>
    </select><br><br>

    <button type="submit" name="add">Add Appointment</button>

</form>

<br>
<a href="admin-dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>