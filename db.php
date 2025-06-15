<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recsync_step6";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>