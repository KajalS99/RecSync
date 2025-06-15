<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Delete Reservation</title></head>
<body>
<h2>Delete Reservation</h2>
<form method="POST">
    Reservation ID: <input type="number" name="reservation_id" required><br>
    <input type="submit" name="submit" value="Delete">
</form>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['reservation_id'];
    $sql = "DELETE FROM reservation WHERE reservation_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>