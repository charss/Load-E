<html>
    <head>
        <link rel="stylesheet" href="./style.css">
        <script src="script.js"></script>
    </head>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Lexend:wght@500&family=Rubik&display=swap');

        .parent {
            height: 300px;
        }

        .test_scroll {
            height: 85%;
            margin-bottom: 200px;
        }

        .promo_div {
            height: 100%;
            margin: 0em;
            overflow-y: auto; 
        }

        .contact {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            position: relative;
            padding: 15px 15px 15px 15px;
        }

        .contact:hover .number {
            font-size: 20px;
            font-weight: bold;
            color: var(--secondary);
        }

        .username {
            grid-area: 1 / 1 / 2 / 2;
            position: relative;
            font-weight: 600;
            font-size: 20px;
        }

        .number {
            grid-area: 1 / 2 / 2 / 6;
            position: relative;
            text-align: right;
            place-self: end;
            color: var(--light_gray);
            font-size: 12px;
        }
    </style>
    <body>
        <div class='parent'>
            <div class='topbar'>
                <a href='./enter_number.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>PROFILES</text>
            </div>
            <div class='test_scroll'>
                <div class='promo_div'>
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
                                $name = $row['name'];
                                echo "<a href='../Customer/enter_number.php?num=$num' class='no_deco'><div class='contact'>";
                                echo "<div class='username'>$name</div><div class='number'>$num</div>";
                                echo "</div></a>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </div>
                
            </div>
        </div>
    </body>
</html>