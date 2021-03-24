<html>
    <head>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="test">
            <form method='post'>
                <div class='topnav'> 
                    <input type='submit' name='regular' value='Regular Load'>
                    <input type='submit' name='promo' value='Promos'>

                    <!-- <a class='active' href='#home'>Regular Load</a>
                    <a href="#news">Promos</a> -->
                </div>
            </form>
            <?php  
                if(isset($_POST['promo'])) {
                    include 'promo_screen.html';
                } else if(isset($_POST['regular'])) {
                    include 'regular_screen.php';
                }
            ?>
        </div>
        
    </body>
</html>
