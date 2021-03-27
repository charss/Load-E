<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style>
        .topbar {
            height: 10px;
        }
    </style>
    <body>
        <?php 
            session_start();
            $number = $_SESSION['number'];
            $load = $_SESSION['load'];
            $cash = $_SESSION['cash'];
            echo "$number - $load - $cash";
        ?>
        <div class='parent'>
            <div class='topbar'>
            </div>
            <div class='container'>
                <span>Are you a sure</span>
                <a href='./Customer/profile_or_load.html' class='button'>CUSTOMER</a>
                <a href='' class='button'>VENDOR</a>
            </div>
        </div>
        

    </body>
</html>