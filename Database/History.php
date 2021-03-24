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

		$sql = "SELECT id, num, promo, cost,date_purc,date_exp FROM history ORDER BY id";
		$result = $conn->query($sql);
		echo "<th>Num</th><th>Promo</th><th>Cost</th><th>Date Purchased</th><th>Date Expiration</th>";
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["num"]; 
				echo "</td> <td>" . $row["promo"];
				echo "</td> <td>" . $row["cost"];
				echo "</td> <td>" . $row["date_purc"];
				echo "</td> <td>" . $row["date_exp"];
				echo "</td><tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</html>