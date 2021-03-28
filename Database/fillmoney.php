<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loade";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = '';
$sql .= "INSERT INTO money (id) VALUES (1);";
$sql .= "INSERT INTO money (id) VALUES (5);";
$sql .= "INSERT INTO money (id) VALUES (10);";
$sql .= "INSERT INTO money (id) VALUES (20);";
$sql .= "INSERT INTO money (id) VALUES (50);";
$sql .= "INSERT INTO money (id) VALUES (100);";
$sql .= "INSERT INTO money (id) VALUES (200);";
$sql .= "INSERT INTO money (id) VALUES (500);";
$sql .= "INSERT INTO money (id) VALUES (1000);";




if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>