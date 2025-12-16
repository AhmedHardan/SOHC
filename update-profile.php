<?php
$title = "Update Profile - Salalah Oasis Hospital";

session_start();

// Protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'includes/dbconnect.php';
include 'includes/header.php';
include 'includes/nav.php';

$username = $_SESSION['username'];

// Get current user data
$query = "SELECT mobile_number FROM patients WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle update
if (isset($_POST['update'])) {
    $mobile = $_POST['mobile'];

    $updateQuery = "UPDATE patients SET mobile_number = ? WHERE username = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$mobile, $username]);

    header("Location: user-home.php?updated=1");
    exit;
}
?>

<div class="login-container">
    <h2>Update Profile</h2>

    <form method="POST">
        <label>Mobile Number</label>
        <input type="number" name="mobile" value="<?php echo htmlspecialchars($user['mobile_number']); ?>" required>

        <input type="submit" name="update" value="Update">
    </form>

    <p style="margin-top:10px;">
        <a href="user-home.php">Back to Profile</a>
    </p>
</div>

<?php include 'includes/footer.php'; ?>
