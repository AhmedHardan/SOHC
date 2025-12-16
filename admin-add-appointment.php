<?php
session_start();

// Protect staff page
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

include 'includes/dbconnect.php';
include 'includes/header.php';
include 'includes/nav.php';

if (isset($_POST['add'])) {

    $patient_username = $_POST['patient_username'];
    $doctor_name = $_POST['doctor_name'];
    $department = $_POST['department'];
    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];

    $query = "INSERT INTO appointments 
        (patient_username, doctor_name, department, appointment_date, status)
        VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $patient_username,
        $doctor_name,
        $department,
        $appointment_date,
        $status
    ]);

    $success = "Appointment added successfully";
}
?>

<div class="login-container">
    <h2>Add Appointment</h2>

    <?php if (isset($success)): ?>
        <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Patient Username</label>
        <input type="text" name="patient_username" required>

        <label>Doctor Name</label>
        <input type="text" name="doctor_name" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <label>Appointment Date</label>
        <input type="date" name="appointment_date" required>

        <label>Status</label>
        <input type="text" name="status" value="Scheduled" required>

        <input type="submit" name="add" value="Add Appointment">
    </form>

    <p style="margin-top:10px;">
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </p>
</div>

<?php include 'includes/footer.php'; ?>
