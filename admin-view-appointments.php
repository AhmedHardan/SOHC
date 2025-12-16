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

//4 - prepare SQL query
$query = "SELECT * FROM appointments";

//5 - prepare statement
$stmt = $pdo->prepare($query);

//6 - execute statement
$stmt->execute();

//7 - fetch all appointment records
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin View Appointments</title>
</head>
<body>

<h2>All Appointments</h2>

<?php
// Display table
echo "<table border='1' cellpadding='10' cellspacing='0'>";

// Table header
echo "<tr>
        <th>Appointment ID</th>
        <th>Patient Username</th>
        <th>Doctor Name</th>
        <th>Department</th>
        <th>Appointment Date</th>
        <th>Status</th>
        <th colspan='2'>Actions</th>
      </tr>";

// Loop through appointments
foreach ($appointments as $appointment) {

    echo "<tr>
            <td>{$appointment['appointment_id']}</td>
            <td>{$appointment['patient_username']}</td>
            <td>{$appointment['doctor_name']}</td>
            <td>{$appointment['department']}</td>
            <td>{$appointment['appointment_date']}</td>
            <td>{$appointment['status']}</td>

            <td>
                <a href='delete-appointment.php?id={$appointment['appointment_id']}'
                   onclick=\"return confirm('Are you sure you want to delete this appointment?');\">
                   Delete
                </a>
            </td>

            <td>
                <a href='update-appointment.php?id={$appointment['appointment_id']}'>
                   Update
                </a>
            </td>
          </tr>";
}

// Close table
echo "</table>";
?>

<br>
<a href="admin_dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
