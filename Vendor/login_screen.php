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
                <a href='../index.html'>
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
                if(isset($_POST['user']) && isset($_POST['pass']) && $_POST['user'] != '' && $_POST['pass'] != '') {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                        
                    if ($user != 'vendor' or $pass != 'try') {
                        echo "<script>alert('Incorrect! Please try again.')</script>";
                        // header("refresh:0.1; url=login_profile.php");
                    } else {
                        header("location: ./transaction_history.php");
                    }
                } 

            }
            
        ?>
    </body>
</html>