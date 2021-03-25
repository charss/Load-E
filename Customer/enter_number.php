<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="parent">
            <div class='container'>
                <form method='post'>
                    <div class='inner'>
                        <span>
                            <input type='number' name='mobile_number'>
                            <a href='#' class='quick_button'>Q</a>
                            <input type='submit' name='submit' value='Next'>
                        </span>
                    </div>
                </form>
                <!-- <a href='./loading_option.html' class='number_next'>Next</a> -->
                <a href='./profile_or_load.html'>Back</a>
            </div>
        </div>
        

        <?php 
            if (isset($_POST['submit'])) {
                if ($_POST['mobile_number'] === '') {
                    echo "<script>alert('Please input a number!')</script>";
                } else {
                    $globetm = array("0905", "0906", "0916", "0926", "0927", 
                                     "0936", "0937", "0953", "0954", "0955", 
                                     "0965", "0977", "0978", "0979", "0996", 
                                     "0997");

                    $smart   = array("0908", "0918", "0919", "0920", "0921", 
                                     "0928", "0929", "0939", "0947", "0949", 
                                     "0951", "0961", "0998", "0999");

                    $sun     = array("0922", "0923", "0924", "0925", "0931", 
                                     "0932", "0933", "0934", "0940", "0941", 
                                     "0942", "0943", "0973", "0974");

                    $tnt     = array("0907", "0909", "0910", "0912", "0930", 
                                     "0938", "0946", "0948", "0950");

                    $globe   = array("0915", "0917", "0945", "0956", "0966",  
                                     "0967", "0977", "0994", "0995");

                    $tm = array("0935", "0975");
                    $globepost = array("09173", "09175", "09176", "09178", 
                                       "09253", "09255", "09256", "09257", 
                                       "09258");
                                       
                    $num = $_POST['mobile_number'];
                    $len = strlen($num);
                    $get_09 = substr($num, 0, 2);
                    $check = 1;
                    $network = '';

                    if ($get_09 != "09") {
                        echo "<script>alert('Invalid number. Please enter a valid mobile number that starts with 09.')</script>";
                    } else if ($len != 11) {
                        echo "<script>alert('Invalid Number. Make sure it is 11 numbers.')</script>";
                    } else {
                        $check += 1;
                    }

                    $get_4dgt = substr($num, 0, 4);
                    $get_5dgt = substr($num, 0, 5);
                    
                    while ($check == 2) {
                        $len = count($globetm);
                        $invalid = 0;
                        for($i = 0; $i < $len; $i++){
                            if ($get_4dgt == $globetm[$i]){
                                echo "Your network is Globe/TM<br>";
                                $network = 'Globe/TM';
                                $check = 4; 
                                $invalid = 1;
                            }
                        }

                        $len = count($globe);
                        for($i = 0; $i < $len; $i++){
                            if ($get_4dgt == $globe[$i]){
                                echo "Your network is Globe<br>";
                                $network = 'Globe';
                                $check = 4; 
                                $invalid = 1;
                            }
                        }
                        
                        $len = count($tm);
                        for($i = 0; $i < $len; $i++){
                            if ($get_4dgt == $tm[$i]){
                                echo "Your network is TM<br>";
                                $network = 'TM';
                                $check = 4; 
                                $invalid = 1;
                            }
                        }

                        $len = count($globepost);
                        for($i = 0; $i < $len; $i++){
                            if ($get_5dgt == $globepost[$i]){
                                echo "Your network is Globe Postpaid<br>";
                                $network = 'Globe Postpaid';
                                $check=4;
                                $invalid = 1; 
                            }
                        }
                        
                        $len = count($smart);
                        for($i = 0; $i<$len; $i++){
                            if ($get_4dgt == $smart[$i]){
                                echo "Your network is Smart<br>";
                                $network = 'Smart';
                                $check = 4;
                                $invalid = 1;
                            }
                        }
                        
                        $len = count($sun);
                        for($i=0; $i<$len; $i++){
                            if ($get_4dgt == $sun[$i]){
                                echo "Your network is Sun<br>";
                                $network = 'Sun';
                                $check=4;
                                $invalid = 1; 
                            }
                        }
                        
                        $len = count($tnt);
                        for($i = 0; $i < $len; $i++){
                            if ($get_4dgt == $tnt[$i]){
                                echo "Your network is Talk N Text<br>";
                                $network = 'Talk N Text';
                                $check = 4; 
                                $invalid = 1;
                            }
                        }

                        if ($invalid == 0){
                            echo "Invalid Network. <br>";
                            break;
                        } else {
                            session_start();
                            $_SESSION['number'] = $num;
                            $_SESSION['network'] = $network;
                            header('location: loading_option.php');
                        }
                    }
                }
            }
        ?>
        
    </body>
</html>