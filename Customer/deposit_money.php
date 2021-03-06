<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src='script.js'></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
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

        .backspace {
            position: relative;
            top: 5px;
            left: 40px;
            width: 25px;
            height: 20px;
            opacity: 0.5;
        }

        .backspace:hover {
            opacity: 1;
        }

        .input_text {
            position: relative;
            left: 25px;
        }

        .input_button:hover {
            background-color: var(--secondary);
        }

        .center {
            margin-left: -15px;
            margin-top: 30px;
        }

        .test {
            height: 500px;
            overflow: visible;
        }

        .title {
            margin-top: 30px;
        }

        .div02 {
            margin-left: -20px;
        }

        .due {
            font-family: 'Rubik';
            font-size: 25px;
            color: var(--secondary);
        }
    </style>
    <body>
        <?php
            session_start();
            ob_start();
            if (isset($_GET['cost'])) {
                $load = $_GET['promo'];
                $cost = $_GET['cost'];
            } else {
                $load = $_SESSION['load'];
                $cost = $_SESSION['cost'];
            } 

            
        ?>
        <div class="test">
            <div class='topbar'>
                <a href='./loading_option.php'>
                    <img src='../assets/back.png'>
                </a>
                <text>PAYMENT</text>
            </div>
            <form method='post'>
                <div class="grid_div1">
                    <div class="div01"> 
                        <p class='title'>Enter Payment</p>
                        <p class='title'>Amount Due: php <?php echo "<span class='due'>" . $cost . "</span>"; ?></p>
                    </div>
                    <div class="div02">
                        <div class='amount_div' id='div_yeah'>
                            <label class='amount_label'>PHP</label>
                            <input type="text" id="result" value='0' name ='cash' class='input_text' maxlength="4" readonly/>
                            <img class='backspace' src='../assets/backspace.png' onclick='clr()'>
                        </div>
                    </div>
                </div>
                <div class='center'>
                    <div class="grid_div2">
                        <div class="div3">
                            <input type="button" class='input_button' value='1' onclick="arr = dis('1', arr)"/>
                        </div>
                        <div class="div4">
                            <input type="button" class='input_button' value='5' onclick="dis('5')"/>
                        </div>
                        <div class="div5"> 
                            <input type="button" class='input_button' value='10' onclick="dis('10')"/>
                        </div>
                        <div class="div6">
                            <input type="button" class='input_button' value='20' onclick="dis('20')"/>
                        </div>
                        <div class="div7"> 
                            <input type="button" class='input_button' value='50' onclick="dis('50')"/>
                        </div>
                        <div class="div8"> 
                            <input type="button" class='input_button' value='100' onclick="dis('100')"/>
                        </div>
                        <div class="div9"> 
                            <input type="button" class='input_button' value='200' onclick="dis('200')"/>
                        </div>
                        <div class="div10"> 
                            <input type="button" class='input_button' value='500' onclick="dis('500')"/>
                        </div>
                        <div class="div11"> 
                           <input type="button" class='input_button' value='1000' onclick="dis('1000')"/>
                        </div>
                        <div class="div12"> 
                            <input type='submit' class='load_next' name='submit' value='Next'>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="btnClickedValue" name="btnClickedValue" />
            </form>
            
            
            <script>
                var arr = [];
                function dis(val) {
                    var current = eval(document.getElementById("result").value);
                    current = current + eval(val);
                    document.getElementById("result").value = current;
                    arr.push(val);
                    document.getElementById('btnClickedValue').value = arr.toString();
                }

                function clr() {
                    arr = []
                    document.getElementById("result").value = "0"
                }
                
            </script>
        </div>

        <?php
            if (isset($_POST['submit'])) {
                if ($_POST['cash'] != "0") {
                    $cash = intval($_POST['cash']);
                    if ($cash >= $cost) {
                        $_SESSION['load'] = $load;
                        $_SESSION['cost'] = $cost;
                        $_SESSION['cash'] = $cash;
                        $_SESSION['bills'] = $_POST['btnClickedValue'];

                        header('location: you_sure.php');
                    } else {
                        echo "<script>alert('Insufficient payment.')</script>";
                    }
                } else {
                    echo "<script>alert('Please enter an amount')</script>";
                }
            }
            ob_flush();
        ?>
    </body>
</html>