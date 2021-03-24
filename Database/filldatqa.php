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
$sql .= "INSERT INTO history (num,promo,cost,date_purc,date_exp)
VALUES ('09983023652','GigaSurf99','99','May 30','June 7');";
$sql .= "INSERT INTO users (num,name,sim_prov,regdate)
VALUES ('09983023652','Andre Cal','SMART','May 30');";
$sql .= "INSERT INTO promo (promo,sim_prov,cost)
VALUES ('Giga99','SMART','99')";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
