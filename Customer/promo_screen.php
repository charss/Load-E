<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>

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
            grid-template-columns: 0.2fr 1fr;
            grid-template-rows: 1fr;
            grid-column-gap: 0px;
            grid-row-gap: 0px;;
            padding: 5px;
        }

        .contact div {
            border: 1px solid pink;
        }

        .price {
            grid-area: 1 / 1 / 2 / 2;
            text-align: center;
            vertical-align: middle;
            place-self: center;
            
        }
        
        .price .cash {
            font-size: 30px;
            font-weight: 600;
        }
        .descrip {
            grid-area: 1 / 2 / 2 / 6;;
        }
    </style>
    <body>
        <?php 
            session_start();
            $network = $_SESSION['network'];
        ?>
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

                        $sql = "SELECT * FROM promo WHERE sim_prov='$network' ORDER BY cost";
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
                                echo "<div class='price'>";
                                echo "<span>PHP</span><span class='cash'>$cost</span>";
                                echo "</div>";
                                echo "<div class='descrip'>";
                                echo "<p>$promo</p><p>$sim_desc</p>";
                                echo "</div>";
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
