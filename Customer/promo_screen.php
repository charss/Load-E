<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .promo_div {
            overflow: scroll; 
        }
    </style>
    <body>
        <div class="test">
            <div class='topbar'>
                <a href='./enter_number.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>BUY LOAD</text>
            </div>
            <div class='topnav'> 
                <a href='./loading_option.php' name='regular'>Regular Load</a>
                <a href='./promo_screen.php' class='nav_active' name='promo'>Promos</a>
            </div>
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

                    $sql = "SELECT * FROM promo";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            
                            $promo = $row['promo'];
                            $sim_prov = $row['sim_prov'];
                            $sim_desc = $row['sim_desc'];
                            $validity = $row['validity'];
                            $cost = $row['cost'];
                            echo "<a href='#' class='no_deco'><div class='contact'>";
                            echo "$promo - $sim_prov";
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
