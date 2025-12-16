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

// Get appointment ID
if (!isset($_GET['id'])) {
    header("Location: admin-view-appointments.php");
    exit;
}

$appointment_id = $_GET['id'];

// Fetch appointment details
$query = "SELECT * FROM appointments WHERE appointment_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$appointment_id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

// If appointment not found
if (!$appointment) {
    echo "<p>Appointment not found.</p>";
    exit;
}

// Handle update
if (isset($_POST['update'])) {

    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE appointments 
                    SET appointment_date = ?, status = ?
                    WHERE appointment_id = ?";

    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([
        $appointment_date,
        $status,
        $appointment_id
    ]);

    header("Location: admin-view-appointments.php?updated=1");
    exit;
}
?>

<div class="login-container">
    <h2>Update Appointment</h2>

    <p><strong>Patient:</strong> <?php echo htmlspecialchars($appointment['patient_username']); ?></p>
    <p><strong>Doctor:</strong> <?php echo htmlspecialchars($appointment['doctor_name']); ?></p>

    <form method="POST">
        <label>Appointment Date</label>
        <input type="date" name="appointment_date"
               value="<?php echo htmlspecialchars($appointment['appointment_date']); ?>"
               required>

        <label>Status</label>
        <select name="status" required>
            <option value="Scheduled" <?php if ($appointment['status']=="Scheduled") echo "selected"; ?>>Scheduled</option>
            <option value="Completed" <?php if ($appointment['status']=="Completed") echo "selected"; ?>>Completed</option>
            <option value="Cancelled" <?php if ($appointment['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>
        </select>

        <input type="submit" name="update" value="Update Appointment">
    </form>

    <p style="margin-top:10px;">
        <a href="admin-view-appointments.php">Back to Appointments</a>
    </p>
</div>

<?php include 'includes/footer.php'; ?>
