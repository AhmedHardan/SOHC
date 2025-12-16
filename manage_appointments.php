<?php
session_start();
include 'includes/dbconnect.php';

/* Protect page */
if (!isset($_SESSION['staff'])) {
    header("Location: staff_login.php");
    exit;
}

/* Handle status update */
if (isset($_POST['update_status'])) {
    $appointment_id = $_POST['appointment_id'];
    $status = $_POST['status'];

    $query = "UPDATE appointments SET status = ? WHERE appointment_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$status, $appointment_id]);
}

/* Handle delete */
if (isset($_GET['delete'])) {
    $appointment_id = $_GET['delete'];

    $query = "DELETE FROM appointments WHERE appointment_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$appointment_id]);

    header("Location: manage_appointments.php");
    exit;
}

/* Fetch appointments */
$query = "SELECT * FROM appointments ORDER BY appointment_date DESC";
$stmt = $pdo->query($query);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background: #f2f2f2; }
        form { margin: 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Appointments</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Department</th>
            <th>Date</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($appointments as $a): ?>
        <tr>
            <td><?= $a['appointment_id']; ?></td>
            <td><?= htmlspecialchars($a['patient_username']); ?></td>
            <td><?= htmlspecialchars($a['doctor_name']); ?></td>
            <td><?= htmlspecialchars($a['department']); ?></td>
            <td><?= $a['appointment_date']; ?></td>

            <td>
                <form method="POST">
                    <input type="hidden" name="appointment_id" value="<?= $a['appointment_id']; ?>">
                    <select name="status">
                        <option <?= $a['status']=='Pending'?'selected':''; ?>>Pending</option>
                        <option <?= $a['status']=='Approved'?'selected':''; ?>>Approved</option>
                        <option <?= $a['status']=='Completed'?'selected':''; ?>>Completed</option>
                    </select>
            </td>

            <td>
                    <button type="submit" name="update_status">Update</button>
                </form>
            </td>

            <td>
                <a href="manage_appointments.php?delete=<?= $a['appointment_id']; ?>"
                   onclick="return confirm('Delete this appointment?')">
                   ❌
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="admin_dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
