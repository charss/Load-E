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

		$sql = "SELECT id, promo, sim_prov, sim_desc, validity, cost FROM promo ORDER BY id";
		$result = $conn->query($sql);
		echo "<th>Promo</th><th>Sim Provider</th><th>Cost</th>";
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "</td> <td>" . $row["promo"];
				echo "</td> <td>" . $row["sim_prov"];
				echo "</td> <td>" . $row["cost"];
				echo "</td><tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</html>