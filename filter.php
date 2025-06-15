<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Filter Reservations</title></head>
<body>
<h2>Filter Reservations by Date</h2>
<form method="POST">
    From Date: <input type="date" name="start_date" required>
    To Date: <input type="date" name="end_date" required>
    <input type="submit" name="submit" value="Search">
</form>

<?php
if (isset($_POST['submit'])) {
    $from = $_POST['start_date'];
    $to = $_POST['end_date'];

    $sql = "SELECT * FROM reservation WHERE DATE(reservation_time) BETWEEN '$from' AND '$to'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Time</th><th>Guests</th><th>Checked In</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['reservation_id']}</td><td>{$row['reservation_time']}</td><td>{$row['guest_count']}</td><td>{$row['checked_in']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No reservations found.";
    }
}
?>
</body>
</html>