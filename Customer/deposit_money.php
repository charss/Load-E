<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <script src='script.js'></script>
    </head>
    <!-- create table -->
    <body class='parent'>
        <?php 
            session_start();
        ?>
        <form method='post'>
            <div>
                <div class='title '>Payment</div>
                <table border="1" class='regular_load_table'>
                    <tr>
                        <td colspan="3"><input type="text" id="result" value='0' class='input_text' maxlength="4" readonly/></td>
                    </tr>
                    <tr>
                        <!-- create button and assign value to each button -->
                        <!-- dis("1") will call function dis to display value -->
                        <td><input type="button" class='input_button' value='1' onclick="dis('1')"/> </td>
                        <td><input type="button" class='input_button' value='5' onclick="dis('5')"/> </td>
                        <td><input type="button" class='input_button' value='10' onclick="dis('10')"/> </td>
                    </tr>
                    <tr>
                        <td><input type="button" class='input_button' value='20' onclick="dis('20')"/> </td>
                        <td><input type="button" class='input_button' value='50' onclick="dis('50')"/> </td>
                        <td><input type="button" class='input_button' value='100' onclick="dis('100')"/> </td>
                    </tr>
                    <tr>
                        <td><input type="button" class='input_button' value='200' onclick="dis('200')"/> </td>
                        <td><input type="button" class='input_button' value='500' onclick="dis('500')"/> </td>
                        <td><input type="button" class='input_button' value='1000' onclick="dis('1000')"/> </td>
                    </tr>
                    <tr>
                        <td colspan='3'><input type='button' name='reset' value='Reset' onclick="clr()">
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
                    }
                }
            }
        ?>
        
    </body>
</html>