<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Update Reservation</title></head>
<body>
<h2>Update Reservation</h2>
<form method="POST">
    Reservation ID: <input type="number" name="reservation_id" required><br>
    New Guest Count: <input type="number" name="guest_count"><br>
    New Reservation Time: <input type="datetime-local" name="reservation_time"><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['reservation_id'];
    $guests = $_POST['guest_count'];
    $time = $_POST['reservation_time'];

    $updates = [];
    if (!empty($guests)) $updates[] = "guest_count = $guests";
    if (!empty($time)) $updates[] = "reservation_time = '$time'";
    $sql = "UPDATE reservation SET " . implode(", ", $updates) . " WHERE reservation_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>