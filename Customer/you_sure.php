<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');
        * {
            font-family: 'Open Sans';
            font-weight: 400;
        }

        .button {
            font-size: 20px;
        }

        .due {
            font-family: 'Rubik';
            font-size: 25px;
            color: var(--secondary);
        }

        .grid_confirm {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            margin-top: 10px;
        }


        .amount_due { grid-area: 1 / 1 / 2 / 2; }
        .amount { grid-area: 1 / 2 / 2 / 3; }
        .load_for { grid-area: 2 / 1 / 3 / 2; }
        .for_number { grid-area: 2 / 2 / 3 / 3; }

        .amount, .for_number { text-align: right; }
    </style>
    <body>
        <?php 
            session_start();
            $number = $_SESSION['number'];
            $load = $_SESSION['load'];
            $cost = $_SESSION['cost'];
            $cash = $_SESSION['cash'];
        ?>
        <div class='parent'>
            <div class='topbar'>
                <a href='./deposit_money.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>CONFIRMATION</text>
            </div>
            <div class='container'>
                <span class='title due'>
                    <?php 
                        if ($load == 'Regular') {
                            echo "$load $cost";
                        } else {
                            echo "$load";
                        }
                    ?>
                </span>
                <div class='grid_confirm'>
                    <div class='amount_due'>Amount Due</div><?php echo "<div class='amount'>$cost</div>" ?>
                    <div class='load_for'>Buying load for:</div><?php echo "<div class='for_number'>$number</div>" ?>
                </div>
                
                <a href='receipt.php' class='button'>Pay PHP <?php echo $cash ?></a>
            </div>
        </div>
    </body>
</html>