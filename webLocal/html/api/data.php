<?php
header('Content-Type: application/jason');

// $servername = "localhost";
// $username = "arduino";
// $password = "arduinotest";
// $dbname = "greenhouse";
//
// // Create connection
// $mysqli = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }
include 'connect.php';
$query = "SELECT DATE_FORMAT(time, '%D %b %H:%i') AS Date,value1
                  FROM sensor
                  ORDER BY id ";

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
  }

$result->close();
$mysqli->close();

print json_encode($data);

?>
