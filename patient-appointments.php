<div class="login-container">
    <h2>My Appointments</h2>

    <?php if (count($appointments) > 0): ?>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>Doctor</th>
                <th>Department</th>
                <th>Date</th>
                <th>Status</th>
            </tr>

            <?php foreach ($appointments as $appt): ?>
                <tr>
                    <td><?php echo htmlspecialchars($appt['doctor_name']); ?></td>
                    <td><?php echo htmlspecialchars($appt['department']); ?></td>
                    <td><?php echo htmlspecialchars($appt['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($appt['status']); ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>

    <p style="margin-top:15px;">
        <a href="user-home.php">Back to Profile</a> |
        <a href="logout.php">Logout</a>
    </p>
</div>

<?php include ('includes/footer.php'); ?>
