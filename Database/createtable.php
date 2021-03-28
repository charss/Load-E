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

// sql to create table
$history = "CREATE TABLE history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num VARCHAR(11) NOT NULL,
promo VARCHAR(30) NOT NULL,
cost INT(30) NOT NULL,
-- date_purc VARCHAR(30) NOT NULL,
-- date_exp VARCHAR(30) NOT NULL,
date_purc TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$users = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(30) NOT NULL,
num VARCHAR(11) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$promo = "CREATE TABLE promo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
promo VARCHAR(30) NOT NULL,
sim_prov VARCHAR(30) NOT NULL,
sim_desc VARCHAR(256) NOT NULL,
validity VARCHAR(30) NOT NULL,
cost INT(30) NOT NULL
)";

$money = "CREATE TABLE money (
id INT(4) PRIMARY KEY,
pieces INT(30) NOT NULL DEFAULT 0
)";

if ($conn->query($promo) === TRUE) {
  echo "Table Promo created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

if ($conn->query($history) === TRUE) {
  echo "Table History created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

if ($conn->query($users) === TRUE) {
  echo "Table Users created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

if ($conn->query($money) === TRUE) {
  echo "Table Money created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
?>
