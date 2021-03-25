<html>
    <head>
        <style>
            input[type="button"] {
                background-color:green;
                color: black;
                border: solid black 2px;
                width:100%
            }

            input[type="text"] {
                background-color:white;
                border: solid black 2px;
                width: 100%
            }

        </style>
        <link rel='stylesheet' href='style.css'>
        <script src='script.js'></script>
    </head>
    <!-- create table -->
    <body class='parent'>
        <form method='post'>
            <div>
                <div class='title'>Load</div>
                <!-- <div class='title '>GeeksforGeeks Calculator</div> -->
                <table border="1" class='regular_load_table'>
                    <tr>
                        <td colspan="3"><input type="text" onkeypress="return onlyNumber(event)" id="result" name='load' maxlength="4"/></td>
                    </tr>
                    <tr>
                        <!-- create button and assign value to each button -->
                        <!-- dis("1") will call function dis to display value -->
                        <td><input type="button" value="10" onclick="load_dis('10')"/> </td>
                        <td><input type="button" value="20" onclick="load_dis('20')"/> </td>
                        <td><input type="button" value="30" onclick="load_dis('30')"/> </td>
                    </tr>
                    <tr>
                        <td><input type="button" value="50" onclick="load_dis('50')"/> </td>
                        <td><input type="button" value="100" onclick="load_dis('100')"/> </td>
                        <td><input type="button" value="150" onclick="load_dis('150')"/> </td>
                    </tr>
                    <tr>
                        <td><input type="button" value="450" onclick="load_dis('400')"/> </td>
                        <td><input type="button" value="600" onclick="load_dis('600')"/> </td>
                        <td><input type="button" value="900" onclick="load_dis('900')"/> </td>
                    </tr>
                </table>
                <input type='submit' name='submit' value='Next'>
            </div>
        </form>
        
        <?php
            if (isset($_POST['submit'])) {
                if ($_POST['load'] === '') {
                    echo "<script>alert('Please enter an amount')</script";
                } else {
                    $load = intval($_POST['load']);
                    if ($load < 5 or $load > 1000) {
                        echo "<script>alert('You have provided an invalid amount. Please enter a value between 5 - 1000')</script>";
                    } else {
                        session_start();
                        $_SESSION['load'] = $num;
                        header('location: deposit_money.php');
                    }
                }
            }
        ?>
        
    </body>
</html>