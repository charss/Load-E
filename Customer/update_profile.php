<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="parent">
            <div class='container'>
                <h1>UPDATE PROFILE</h1>
                <form method='post'>
                    <div class='inner'>
                        <input type='text' name='user' placeholder='username'>
                        <input type='text' name='pass' placeholder='password'>
                        <input type='text' name='cpass' placeholder='Confirm Password'>
                        <input type='number' name='number' placeholder='number'>
                        <input type='submit' name='register' value='Register'>
                    </div>
                </form>
                <a href='register_or_update.html'>Back</a>
            </div>
        </div>
        <?php
            if (isset($_POST['register'])) {
                if ($_POST['user'] == '' or $_POST['pass'] == '' or $_POST['cpass'] == '' or $_POST['number'] == '') {
                    echo "<script>alert('Password and confirm password are not the same')</script>";
                } else {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $cpass = $_POST['cpass'];
                    $number = $_POST['number'];
                
                    if ($cpass != $pass) {
                        echo "<script>alert('Password and confirm password are not the same')</script>";
                    } else {
                        $conn = new mysqli('localhost', 'root', '', 'loade');
                        if ($conn->connect_error) {
                            die('Connection failed: ' . $conn->connect_error);
                        }

                        $sql = "SELECT name FROM users WHERE username='$user'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<script>alert('Username already exist')";
                        } else {
                            $sql = "INSERT INTO users (name, pass, num) VALUES ('$user', '$pass', '$number')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('New record created successfully')</script>";
                            } else {
                                echo "<script>alert('Error')</script>";
                                // echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }

                    $conn->close();
                }
                
                
            }
        ?>
    </body>
</html>