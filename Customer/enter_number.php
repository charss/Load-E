<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style> 
        .input_text { 
            border-bottom: 1px solid gray;
        }

        .button_next {
            left: 50%;
            transform: translate(-50%);
            margin-top: 0px;
            padding: 5px 10px;
            width: auto;
            font-size: 15px;
        }
    </style>
    
    <?php 
        session_start();
    ?>  
    <script src='./script.js'></script>
    <body>
        <div class="parent">
            <div class='topbar'>
                <a href='./profile_or_load.html'>
                    <img src='../assets/back.png'>
                </a>
                <text>BUY LOAD</text>
            </div>
            <div class='container'>
                <span class='header_text'>Enter Number</span>
                <form class='number_form' method='post'>
                    <div class='number_div' id='input1'>
                        <input type='text' class='number_input' maxlength="11" id='in' autocomplete='off' onkeypress="return onlyNumber(event)" name='mobile_number' value='<?php if (isset($_GET['num'])) { echo $_GET['num']; } else { echo ""; } ?>' placeholder='Number' />
                        <a href='./contacts.php' name='mobile_number' class='quick_a'>
                            <img src='../assets/contacts.svg' onmouseover="this.src='../assets/trial.svg'" onmouseout="this.src='../assets/contacts.svg'" class='quick_button'>
                        </a>
                    </div>
                    
                    <br>
                    <input type='submit' class='button_next' name='submit' value='Next'>
                </form>
                
            </div>
        </div>

        <?php 
            if (isset($_POST['submit'])) {
                if ($_POST['mobile_number'] == ''){
                    echo "<script>alert('Please input a number!')</script>";
                } else {
                    $x = '';
                    $x = include './validation_source.php';
                    if ($x == 1) {
                        $_SESSION['number'] = $_POST['mobile_number'];
                        header('location: loading_option.php');
                        exit();
                    }
                }
            } 
        ?>
        <script src='../javascript/regular_load.js'></script>
        <script src='../javascript/highlight.js'></script>
    </body>
</html>