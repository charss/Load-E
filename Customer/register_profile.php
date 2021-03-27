<html>
    
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="parent">
            <div class='topbar'>
                <a href='./register_or_update.html'>
                    <img src='../assets/back.png'>
                </a>
                <text>REGISTER PROFILE</text>
            </div>
            <div class='registration_div'>
                <span class='header_text'>Registration Form</span>
                <form method='post'>
                    <div class='inner'>
                        <input type='text' class='text_input' name='user' placeholder='Username'>
                        <input type='password' class='text_input' name='pass' placeholder='Password'>
                        <input type='password' class='text_input' name='cpass' placeholder='Confirm Password'>
                        <input type='number' class='text_input' name='mobile_number' placeholder='Number'>
                        <input type='submit' class='button_next' name='register' value='Register'>
                    </div>
                </form>
            </div>
        </div>
        <?php
            if (isset($_POST['register'])) {
                if ($_POST['user'] == '' or $_POST['pass'] == '' or $_POST['cpass'] == '' or $_POST['mobile_number'] == '') {
                    echo "<script>alert('Please complete the required information')</script>";
                } else {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $cpass = $_POST['cpass'];
                    $number = $_POST['mobile_number'];
                
                    if ($cpass != $pass) {
                        echo "<script>alert('Password and confirm password are not the same')</script>";
                    } else {
                        $conn = new mysqli('localhost', 'root', '', 'loade');
                        if ($conn->connect_error) {
                            die('Connection failed: ' . $conn->connect_error);
                        }

                        $sql = "SELECT name FROM users WHERE name='$user'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<script>alert('Username already exist')</script>";
                        } else {
                            $x = include 'validation_source.php';
                            if ($x == 1) {
                                $sql = "INSERT INTO users (name, pass, num) VALUES ('$user', '$pass', '$number')";
                                if ($conn->query($sql) === TRUE) {
                                    echo "<script>alert('New record created successfully')</script>";
                                    header("refresh:0.1; url=profile_or_load.html");
                                } else {
                                    echo "<script>alert('Error')</script>";
                                }
                            } 
                        }
                        $conn->close();
                    }

                    
                }
            }
        ?>
    </body>
</html>