<?php
header('Content-Type: application/jason');

$servername = "localhost";
$username = "arduino";
$password = "arduinotest";
$dbname = "greenhouse";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = sprintf("SELECT id, value1,value2 FROM sensor ORDER BY id LIMIT 10");

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
  }

$result->close();
$mysqli->close();

print json_encode($data);

?>
