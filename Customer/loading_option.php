<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .load_next {
            margin-top: 15px;
            border: 2px solid var(--secondary);
            color: var(--secondary);
            background: var(--main);
        }

        .load_next:hover {
            background: var(--secondary);
            color: #F5F5F5;
        }
    </style>
    <body>
        <?php
            session_start();
        ?>
        <div class="test">
            <div class='topbar'>
                <a href='./enter_number.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>BUY LOAD</text>
            </div>
            <div class='topnav'> 
                <a href='#' name='regular' class='nav_active'>Regular Load</a>
                <a href='./promo_screen.php' name='promo'>Promos</a>
            </div>

            <form method='post'>
                <div class="grid_div1">
                    <div class="div01"> 
                        <p class='title'>Enter Amount</p>
                    </div>
                    <div class="div02">
                        <div class='amount_div' id='div_yeah'>
                            <label class='amount_label'>PHP</label>
                            <input type="text" onkeypress="return onlyNumber(event)" name='load' autocomplete="off" onKeyUp='sample()' id="result" class='input_text' maxlength="4"/>
                        </div>
                        <span class='simple_text'>Enter an amount between 5 - 1000 or choose from the options below.</span>
                    </div>
                </div>
                <div class='center'>
                    <div class="grid_div2">
                        <div class="div3">
                            <input type="button" id='10' class='input_button' name='10' value="10" onclick="load_dis('10')"/>
                        </div>
                        <div class="div4">
                            <input type="button" id='20' class='input_button' name='20' value="20" onclick="load_dis('20')"/>
                        </div>
                        <div class="div5"> 
                            <input type="button" id='30' class='input_button' name='30' value="30" onclick="load_dis('30')"/>
                        </div>
                        <div class="div6">
                            <input type="button" id='50' class='input_button' name='50' value="50" onclick="load_dis('50')"/>
                        </div>
                        <div class="div7"> 
                            <input type="button" id='100' class='input_button' name='100' value="100" onclick="load_dis('100')"/>
                        </div>
                        <div class="div8"> 
                            <input type="button" id='150' class='input_button' name='150' value="150" onclick="load_dis('150')"/>
                        </div>
                        <div class="div9"> 
                            <input type="button" id='400' class='input_button' name='400' value="450" onclick="load_dis('400')"/>
                        </div>
                        <div class="div10"> 
                            <input type="button" id='600' class='input_button' name='600' value="600" onclick="load_dis('600')"/>
                        </div>
                        <div class="div11"> 
                            <input type="button" id='900' class='input_button' name='900' value="900" onclick="load_dis('900')"/>
                        </div>
                        <div class="div12"> 
                            <input type='submit' class='load_next' name='submit' value='Next'>
                        </div>
                    </div>
                </div>
            </form>
            <script src='../javascript/regular_load.js'></script>
            <?php
                if (isset($_POST['submit'])) {
                    if (isset($_POST['load'])) {
                        $load = intval($_POST['load']);
                        if ($load < 5 or $load > 1000) {
                            echo "<script>alert('You have provided an invalid amount. Please enter a value between 5 - 1000')</script>";
                        } else {
                            $_SESSION['load'] = $load;
                            header('location: you_sure.php');
                        }
                    } else {
                        echo "<script>alert('Please enter an amount')</script";
                    }
                }
            ?>
        </div>

        <script>
            var input = document.getElementById('result'), div = document.getElementById('div_yeah');

            input.addEventListener('focus', function() {
                div.classList.add('focused');
            }, false);

            input.addEventListener('blur', function() {
                div.classList.remove('focused');
            }, false);
        </script>
    </body>
</html>
