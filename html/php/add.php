<?php
include 'php/connect.php';

$sensor_SQL = $_GET{'value'};

$sql = "INSERT INTO sensor (value1,value2,value3) VALUES ($sensor_SQL)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
