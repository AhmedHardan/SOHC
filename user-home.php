<?php
$title = "User Interface - Salalah Oasis Hospital";

session_start();

//  protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


include 'includes/dbconnect.php';
include 'includes/header.php';
include 'includes/nav.php';

//  get logged-in username
$username = $_SESSION['username'];

//  fetch patient details
$query = "SELECT first_name, second_name, gender, mobile_number, national_id
          FROM patients
          WHERE username = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="login-container">

    <h2>Welcome, <?php echo $patient['first_name']; ?></h2>

    <p>
        <strong>Full Name:</strong>
        <?php echo $patient['first_name'] . " " . $patient['second_name']; ?>
    </p>

    <p>
        <strong>Gender:</strong>
        <?php echo $patient['gender']; ?>
    </p>

    <p>
        <strong>Mobile Number:</strong>
        <?php echo $patient['mobile_number']; ?>
    </p>

    <p>
        <strong>National ID:</strong>
        <?php echo $patient['national_id']; ?>
    </p>

    <div class="actions">
        <a href="patient-appointments.php">📅 View My Appointments</a>
        <p>
    <a href="update-profile.php">Update My Contact Number</a>
    <p>
    <a href="change-password.php">Change Password</a>
</p>
</p>
        <a href="logout.php">🚪 Logout</a>
    </div>

</div>

<?php
include 'includes/footer.php';
?>
