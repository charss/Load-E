<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="parent">
            <div class='container'>
                <form method='post'>
                    <div class='inner'>
                        <input type='text' name='user' placeholder='username'>
                        <input type='text' name='pass' placeholder='password'>
                        <input type='number' name='number' placeholder='number'>
                        <input type='submit' name='register' value='Register'>
                    </div>
                </form>
                <a href='register_or_load.html'>Back</a>
            </div>
        </div>
        <?php
            if (isset($_POST['register'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $number = $_POST['number'];
                
                
            }
        ?>
    </body>
</html>