<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
            session_start();
        ?>
        <div class="parent">
            <div class='container'>
                <h1>UPDATE PROFILE</h1>
                <form method='post'>
                    <div class='inner'>
                        <input type='text' name='user' placeholder='username' value='<?php echo $_SESSION['name']; ?>' >
                        <input type='text' name='pass' placeholder='password' value='<?php echo $_SESSION['pass'] ?>'>
                        <input type='number' name='number' placeholder='number' value='<?php echo $_SESSION['number'] ?>'>
                        <input type='submit' name='update' value='Update'>
                    </div>
                </form>
                <a href='register_or_update.html'>Back</a>
            </div>
        </div>
        <?php
            if (isset($_POST['update'])) {
                if ($_POST['user'] == '' or $_POST['pass'] == '' or $_POST['number'] == '') {
                    echo "<script>alert('Please complete the required information')</script>";
                } else {
                    $id = $_SESSION['id'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $number = $_POST['number'];
                    
                    $conn = new mysqli('localhost', 'root', '', 'loade');
                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }

                    $sql = "UPDATE users SET name = '$user', pass = '$pass', num = '$number' WHERE id = '$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Profile updated successfully')</script>";
                        unset($_SESSION['name']);
                        unset($_SESSION['pass']);
                        unset($_SESSION['number']);
                        $_SESSION['name'] = $user;
                        $_SESSION['pass'] = $pass;
                        $_SESSION['number'] = $number;
                        header('refresh:0.01; url=profile_or_load.html');;
                    } else {
                        echo "Error updating record: " . $conn->error;
                        // echo "<script>alert('Error updating record')</script>";
                    }
                    $conn->close();
                }
            }
        ?>
    </body>
</html>