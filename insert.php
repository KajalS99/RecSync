<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Insert Reservation</title></head>
<body>
<h2>Insert New Reservation</h2>
<form method="POST">
    Reservation Time: <input type="datetime-local" name="reservation_time" required><br>
    Guest Count: <input type="number" name="guest_count" required><br>
    Checked In: 
    <select name="checked_in">
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select><br>
    <input type="submit" name="submit" value="Insert">
</form>

<?php
if (isset($_POST['submit'])) {
    $time = $_POST['reservation_time'];
    $guests = $_POST['guest_count'];
    $checked = $_POST['checked_in'];

    $sql = "INSERT INTO reservation (reservation_time, guest_count, checked_in)
            VALUES ('$time', $guests, $checked)";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>