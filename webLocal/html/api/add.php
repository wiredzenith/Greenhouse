<?php
include 'connect.php';

$sensor_SQL = $_GET{'value'};

$sql = "INSERT INTO sensor (value1,value2,value3,value4,value5) VALUES ($sensor_SQL)";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
