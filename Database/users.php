<html>
   <head>
    <title></title>
	<style>
    table {
		width: 50%;
	}

	th {
		height: 70px;
	}
	</style>
  </head>
  
<table border ='1'>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "loade";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, num, name, sim_prov, regdate FROM users ORDER BY id";
		$result = $conn->query($sql);
		echo "<th>Num</th><th>Name</th><th>Sim Provider</th><th>Date Registered</th>";
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["num"]; 
				echo "</td> <td>" . $row["name"];
				echo "</td> <td>" . $row["sim_prov"];
				echo "</td> <td>" . $row["regdate"];
				echo "</td><tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</html>