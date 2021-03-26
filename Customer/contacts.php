<html>
    <head>
        <link rel="stylesheet" href="./style.css">
        <script src="script.js"></script>
    </head>

    <body>
        <div class='parent'>
            <div class='topbar'>
                <a href='./enter_number.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>PROFILES</text>
            </div>
            <div>
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

                    $sql = "SELECT name, num FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $num = $row['num'];
                            echo "<a href='../Customer/enter_number.php?num=$num' class='no_deco'><div class='contact'>";
                            echo $row["name"] . '<br>';
                            echo "</div></a>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>