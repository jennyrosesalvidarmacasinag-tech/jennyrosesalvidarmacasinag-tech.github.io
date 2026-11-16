<?php
$servername = "localhost";
$username = "root";   // adjust if needed
$password = "";       // adjust if needed
$dbname = "enrollment_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
