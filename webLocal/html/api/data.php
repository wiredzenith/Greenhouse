<?php
header('Content-Type: application/jason');

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
