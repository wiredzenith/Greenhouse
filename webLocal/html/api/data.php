<?php
header('Content-Type: application/jason');

include 'connect.php';

if(($_GET['start_date']) === "" or !isset($_GET['start_date']))
{
  $start_date = '1970/01/01';
}
else {
  $start_date = $_GET['start_date'];
}

if(($_GET['end_date']) === "" or !isset($_GET['end_date']))
{
  $end_date = '2038/01/19 23:59';
}
else {
  $end_date = $_GET['end_date'] . ' 23:59:59';
}

$query = "SELECT  DATE_FORMAT(time, '%D %b %Y %H:%i') AS Date,value1,value2
                  FROM sensor
                  WHERE time BETWEEN '$start_date' AND '$end_date'
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
