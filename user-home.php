<?php
session_start();

// Protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'includes/dbconnect.php';
include ('includes/header.php');
include ('includes/nav.php');

// Logged-in username
$username = $_SESSION['username'];

// Fetch patient details
$query = "SELECT first_name, second_name, gender, mobile_number, national_id
          FROM patients
          WHERE username = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="login-container">
    <h2>Welcome, <?php echo htmlspecialchars($patient['first_name']); ?></h2>

    <p><strong>Full Name:</strong>
        <?php echo htmlspecialchars($patient['first_name'] . " " . $patient['second_name']); ?>
    </p>

    <p><strong>Gender:</strong>
        <?php echo htmlspecialchars($patient['gender']); ?>
    </p>

    <p><strong>Mobile Number:</strong>
        <?php echo htmlspecialchars($patient['mobile_number']); ?>
    </p>

    <p><strong>National ID:</strong>
        <?php echo htmlspecialchars($patient['national_id']); ?>
    </p>

    <hr>

    <!-- NEW: View Appointments -->
    <p>
        <a href="patient-appointments.php">📅 View My Appointments</a>
    </p>

    <p>
        <a href="logout.php">Logout</a>
    </p>
</div>

<?php include ('includes/footer.php'); ?>
