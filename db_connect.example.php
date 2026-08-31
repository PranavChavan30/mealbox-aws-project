<?php
$servername = "YOUR-RDS-ENDPOINT";
$username = "YOUR-USERNAME";
$password = "YOUR-PASSWORD";
$dbname = "mealbox_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
