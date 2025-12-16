<?php
session_start();

// protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

include 'includes/dbconnect.php';
include 'includes/header.php';
include 'includes/nav.php';

// fetch patient appointments
$query = "SELECT appointment_id, doctor_name, department, appointment_date, status
          FROM appointments
          WHERE patient_username = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="login-container">
    <h2>My Appointments</h2>

    <?php
    if (count($appointments) > 0) {

        echo "<table border='1' cellpadding='10' cellspacing='0' width='100%'>";
        echo "<tr>
                <th>Appointment ID</th>
                <th>Doctor Name</th>
                <th>Department</th>
                <th>Appointment Date</th>
                <th>Status</th>
              </tr>";

        foreach ($appointments as $appointment) {
            echo "<tr>
                    <td>{$appointment['appointment_id']}</td>
                    <td>{$appointment['doctor_name']}</td>
                    <td>{$appointment['department']}</td>
                    <td>{$appointment['appointment_date']}</td>
                    <td>{$appointment['status']}</td>
                  </tr>";
        }

        echo "</table>";

    } else {
        echo "<p>No appointments found.</p>";
    }
    ?>

    <br>
    <a href="user-home.php">⬅ Back to Dashboard</a>
</div>

<?php include 'includes/footer.php'; ?>
