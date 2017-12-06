<?php
$servername = "192.168.1.11";
$username = "arduino";
$password = "arduinotest";
$dbname = "greenhouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 ?>
