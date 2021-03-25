<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <body>
        <div class="test">
            <form method='post'>
                <div class='topnav'> 
                    <a href='#' name='regular'>Regular Load</a>
                    <a href='#' name='promo'>Promos</a>
                </div>
            </form>

            <form method='post'>
                <div><a name='regular'> 
                    <p class='title'>Enter Amount</p>
                    <table border="1" class='regular_load_table'>
                        <tr>
                            <td colspan="3"><input type="text" onkeypress="return onlyNumber(event)" onKeyUp='sample()' id="result" class='input_text' maxlength="4"/></td>
                        </tr>
                        <tr>
                            <!-- create button and assign value to each button -->
                            <!-- dis("1") will call function dis to display value -->
                            <td><input type="button" id='10' class='input_button' name='10' value="10" onclick="load_dis('10')"/> </td>
                            <td><input type="button" id='20' class='input_button' name='20' value="20" onclick="load_dis('20')"/> </td>
                            <td><input type="button" id='30' class='input_button' name='30' value="30" onclick="load_dis('30')"/> </td>
                        </tr>
                        <tr>
                            <td><input type="button" id='50' class='input_button' name='50' value="50" onclick="load_dis('50')"/> </td>
                            <td><input type="button" id='100' class='input_button' name='100' value="100" onclick="load_dis('100')"/> </td>
                            <td><input type="button" id='150' class='input_button' name='150' value="150" onclick="load_dis('150')"/> </td>
                        </tr>
                        <tr>
                            <td><input type="button" id='400' class='input_button' name='400' value="450" onclick="load_dis('400')"/> </td>
                            <td><input type="button" id='600' class='input_button' name='600' value="600" onclick="load_dis('600')"/> </td>
                            <td><input type="button" id='900' class='input_button' name='900' value="900" onclick="load_dis('900')"/> </td>
                        </tr>
                    </table>
                    <input type='submit' name='submit' value='Next'>
                </div>
            </form>
            <script src='../javascript/regular_load.js'></script>
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
                            $_SESSION['load'] = $load;
                            header('location: receipt.php');
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>
