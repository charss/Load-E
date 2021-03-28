<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loade";
    $total_balance = 0;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM history";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $num = $row['num'];
            $promo = $row['promo'];
            $cost = $row['cost'];
            $date = $row['date_purc'];
            $_SESSION['logged'] = true;
            $total_balance += ($cost - ($cost * 0.1));
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    return $total_balance;
    
?>