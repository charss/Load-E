<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Lexend:wght@500&family=Rubik&display=swap');

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
            grid-template-columns: 0.4fr 1fr;
            grid-template-rows: 1fr;
            grid-column-gap: 0px;
            grid-row-gap: 0px;;
            padding: 5px;
            padding-right: 20px;
        }

        .contact:hover .promo_desc {
            /* transform: scale(1.1);
            margin-right: 20px;
            overflow: hidden; */
            display: block;
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
            color: var(--secondary);
            font-family: 'Rubik';
        }
        .descrip {
            grid-area: 1 / 2 / 2 / 6;;
        }

        .promo_name {
            font-weight: 600;
            
        }

        .promo_desc {
            margin-top: 3px;
            font-size: 12px;
            display: none;
        }
        .pesos {
            font-size: 10px;
        }
    </style>
    <body>
        <?php 
            session_start();
            if (isset($_SESSION['good'])) {
                // placeholder
            } else if (!isset($_SESSION['logged'])) {
                include "../wrong_loc.php";
            }
            unset($_SESSION['logged']);
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
                        if ($network == 'GLOBE/TM') {
                            $sql = "SELECT * FROM promo WHERE sim_prov='GLOBE' OR sim_prov='TM' sim_ ORDER BY cost";
                        } else {
                            $sql = "SELECT * FROM promo WHERE sim_prov='$network' sim_ ORDER BY cost";
                        }
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $promo = $row['promo'];
                                $sim_prov = $row['sim_prov'];
                                $sim_desc = $row['sim_desc'];
                                $validity = $row['validity'];
                                $cost = $row['cost'];
                                $_SESSION['logged'] = true;
                                echo "<a href='deposit_money.php?promo=$promo&cost=$cost' class='no_deco'><div class='contact'>";
                                echo "<div class='price'>";
                                echo "<span class='pesos'>PHP</span><span class='cash'>$cost</span>";
                                echo "</div>";
                                echo "<div class='descrip'>";
                                echo "<span class='promo_name'>$promo</span><br><span class='promo_desc'>$sim_desc</span>";
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
