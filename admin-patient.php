<div class="main">

<h2>Registered Patients</h2>

<?php
// 1 - include the database connection
include 'includes/dbconnect.php';

// 2 - Query to fetch all records from the patients table
$query = "SELECT * FROM patients";
$stmt  = $pdo->query($query);
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// COUNTING RECORDS
$num_records = $stmt->rowCount();

// 3 - Start the HTML table and include the headers
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Patient ID</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>Gender</th>
        <th>Username</th>
        <th>Mobile</th>
        <th>National ID</th>
      </tr>";

// 4 - Loop through the fetched patient records
foreach ($patients as $patient) {
    echo "<tr>
            <td>{$patient['patient_id']}</td>
            <td>{$patient['first_name']}</td>
            <td>{$patient['second_name']}</td>
            <td>{$patient['gender']}</td>
            <td>{$patient['username']}</td>
            <td>{$patient['mobile_number']}</td>
            <td>{$patient['national_id']}</td>
          </tr>";
}

// 5 - Close the table
echo "</table>";

// 6 - Display number of records
echo "<p><strong>Number of records = $num_records</strong></p>";
?>

</div>
