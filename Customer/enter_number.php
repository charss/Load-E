<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style> 
        .input_text { 
            border-bottom: 1px solid gray;
        }
    </style>
    
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
                    <div class='number_div' id='input1'>
                        <input type='number' class='number_input' maxlength="11" id='in' name='mobile_number' value='<?php if (isset($_GET['num'])) { echo $_GET['num']; } ?>' placeholder='Number' />
                        <a href='./contacts.php' name='mobile_number' class='quick_a'>
                            <img src='../assets/contacts.svg' onmouseover="this.src='../assets/contacts_colored.svg'" onmouseout="this.src='../assets/contacts.svg'" class='quick_button'>
                        </a>
                    </div>
                
                <br>
                <input type='submit' name='submit' value='Next'>
            </div>
        </div>

        <?php 
            if (isset($_POST['submit'])) {
                $x = '';
                $x = include './validation_source.php';

                if ($x == 1) {
                    echo "OK";
                }
            } 
        ?>
        <script>
            var input = document.getElementById('in'), div = document.getElementById('input1');

            input.addEventListener('focus', function() {
                div.classList.add('focused');
            }, false);

            input.addEventListener('blur', function() {
                div.classList.remove('focused');
            }, false);
        </script>
    </body>
</html>