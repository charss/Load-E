<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style>
        .header_text {
            text-align: center;
            width: 100%;
        }
    </style>
    <body>
        <div class="parent">
            <div class='topbar'>
                <a href='./register_or_update.html'>
                    <img src='../assets/back.png'>
                </a>
                <text>UPDATE PROFILE</text>
            </div>
            <div class='registration_div'>
                <div class='header_text'>Sign in</div>
                <form method='post'>
                    <div class='inner'>
                        <input type='text' class='text_input' name='user' placeholder='Username'>
                        <input type='password' class='text_input' name='pass' placeholder='Password'>
                        <input type='submit' class='button_next' name='update' value='Next'>
                    </div>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['update'])) {
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'loade';

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die('Connection failed: ' . $conn->connect_error);
                }

                if(isset($_POST['user']) && isset($_POST['pass']) && $_POST['user'] != '' && $_POST['pass'] != '') {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $login = false;
                    $sql = "SELECT * FROM users WHERE name='$user'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        session_start();
                        while($row = $result->fetch_assoc()) {
                            if ($pass == $row['pass']) {
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['number'] = $row['num'];
                                $_SESSION['pass'] = $row['pass'];
                                $_SESSION['logged'] = true;
                                $login = true;
                            }
                        }
                        
                        if ($login == false) {
                            echo "<script>alert('Incorrect password! Please try again.')</script>";
                            header("refresh:0.1; url=login_profile.php");
                        } else {
                            header("location: ./update_profile.php");
                        }
                        
                    } else {
                        echo "<script>alert('Username and password does not exist. Please try again')</script>";
                        header("refresh:0.1; url=login_profile.php");
                    }
                } 

                $conn->close();
            }
            
        ?>
    </body>
</html>