<!DOCTYPE html>
<html>
<body>
<?php 
    session_start();
?>
<link rel='stylesheet' href='./style.css'>
<style>
    /* -------------------------------------
        GLOBAL
        A very basic CSS reset
    ------------------------------------- */
    * {
        margin: 0;
        padding: 0;
        font-family: "Open Sans";
        box-sizing: border-box;
        font-size: 14px;
    }

    img {
        max-width: 100%;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    /* Let's make sure all tables have defaults */
    table td {
        vertical-align: top;
    }

    /* -------------------------------------
        BODY & CONTAINER
    ------------------------------------- */
    body {
        background-color: #f6f6f6;
    }

    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        /* makes it centered */
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
        HEADER, FOOTER, MAIN
    ------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }

    .content-block {
        padding: 0 0 20px;
    }

    .header {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer {
        width: 100%;
        clear: both;
        color: #999;
        padding: 20px;
    }
    .footer a {
        color: #999;
    }
    .footer p, .footer a, .footer unsubscribe, .footer td {
        font-size: 12px;
    }

    /* -------------------------------------
        TYPOGRAPHY
    ------------------------------------- */
    h1, h2, h3 {
        font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        color: #000;
        margin: 40px 0 0;
        line-height: 1.2;
        font-weight: 400;
    }

    h1 {
        font-size: 32px;
        font-weight: 500;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 18px;
    }

    h4 {
        font-size: 14px;
        font-weight: 600;
    }

    p, ul, ol {
        margin-bottom: 10px;
        font-weight: normal;
    }
    p li, ul li, ol li {
        margin-left: 5px;
        list-style-position: inside;
    }

    /* -------------------------------------
        LINKS & BUTTONS
    ------------------------------------- */
    a {
        color: #1ab394;
        text-decoration: underline;
    }

    .btn-primary {
        text-decoration: none;
        color: #FFF;
        background-color: #1ab394;
        border: solid #1ab394;
        border-width: 5px 10px;
        line-height: 2;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border-radius: 5px;
        text-transform: capitalize;
    }

    /* -------------------------------------
        OTHER STYLES THAT MIGHT BE USEFUL
    ------------------------------------- */
    .last {
        margin-bottom: 0;
    }

    .first {
        margin-top: 0;
    }

    .aligncenter {
        text-align: center;
    }

    .alignright {
        text-align: right;
    }

    .alignleft {
        text-align: left;
    }

    .clear {
        clear: both;
    }

    /* -------------------------------------
        ALERTS
        Change the class depending on warning email, good email or bad email
    ------------------------------------- */
    .alert {
        font-size: 16px;
        color: #fff;
        font-weight: 500;
        padding: 20px;
        text-align: center;
        border-radius: 3px 3px 0 0;
    }
    .alert a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
    }
    .alert.alert-warning {
        background: #f8ac59;
    }
    .alert.alert-bad {
        background: #ed5565;
    }
    .alert.alert-good {
        background: #1ab394;
    }

    /* -------------------------------------
        INVOICE
        Styles for the billing table
    ------------------------------------- */
    .invoice {
        margin: 40px auto;
        text-align: left;
        width: 80%;
    }
    .invoice td {
        padding: 5px 0;
    }
    .invoice .invoice-items {
        width: 100%;
    }
    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }
    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 640px) {
        h1, h2, h3, h4 {
            font-weight: 600 !important;
            margin: 20px 0 5px !important;
        }

        h1 {
            font-size: 22px !important;
        }

        h2 {
            font-size: 18px !important;
        }

        h3 {
            font-size: 16px !important;
        }

        .container {
            width: 100% !important;
        }

        .content, .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }

        .button {
            width: 100%;
            height: auto;
        }
</style>

<?php
    $number = $_SESSION['number'];
    $load = $_SESSION['load'];
    $cost = $_SESSION['cost'];
    $cash = $_SESSION['cash'];
    $network = $_SESSION['network'];
    $bills = explode( ',', $_SESSION['bills']);
    $change = $cash - $cost;
    $temp = $change;
    $change_arr = array();
    $change_base = array();

    $conn = new mysqli('localhost', 'root', '', 'loade');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
    $sql = "INSERT INTO history (num, promo, cost) VALUES ('$number', '$load', '$cost')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    foreach ($bills as $key => $value) {
        $x = intval($value);
        // echo gettype(intval($value));
        $sql = "UPDATE money SET pieces=pieces+1 WHERE id=$x";
        // echo $value . "<br />";
        if ($conn->query($sql) === TRUE) {
            // $last_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM money";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $change_base[$row['id']] = $row['pieces'];
        }
    }

    print_r($change_base);

    if ($change_base['1000'] > 0) {
        $change_arr['1000'] = intdiv($temp, 1000);
        $temp %= 1000;
    } 
    
    if ($change_base['500'] > 0){
        $change_arr['500'] = intdiv($temp, 500);
        $temp %= 500;
    } 
    
    if ($change_base['200'] > 0) {
        $change_arr['200'] = intdiv($temp, 200);
        $temp %= 200;
    } 
    
    if ($change_base['100'] > 0) {
        $change_arr['100'] = intdiv($temp, 100);
        $temp %= 100;
    } 
    
    if ($change_base['50'] > 0){
        $change_arr['50'] = intdiv($temp, 50);
        $temp %= 50;
    }

    if ($change_base['20'] > 0){
        $change_arr['20'] = intdiv($temp, 20);
        $temp %= 20;
    }

    if ($change_base['10'] > 0){
        $change_arr['10'] = intdiv($temp, 10);
        $temp %= 10;
    }

    if ($change_base['5'] > 0){
        $change_arr['5'] = intdiv($temp, 5);;
        $temp %= 5;
    }

    if ($change_base['1'] > 0){
        $change_arr['1'] = intdiv($temp, 1);;
        $temp %= 1;
    }

    foreach ($change_arr as $key => $value) {
        $x = intval($key);
        // echo gettype(intval($value));
        $sql = "UPDATE money SET pieces=pieces-$value WHERE id=$x";
        // echo $value . "<br />";
        if ($conn->query($sql) === TRUE) {
            // $last_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>


<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>You have successfully loaded!</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php echo $number;?><br>Receipt #<?php echo $last_id ?><br><?php echo date("F j, Y"); ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Load: </td>
                                                            <td class="alignright">
                                                                <?php 
                                                                    if ($load == 'Regular') {
                                                                        echo "$load $cost";
                                                                    } else {
                                                                        echo $load;
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cash:</td>
                                                            <td class="alignright"><?php echo $cash;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Network:</td>
                                                            <td class="alignright"><?php echo $network;?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Change</td>
                                                            <td class="alignright"><?php echo $change;?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="content-block">
                                        <p>Thank you for using Load-E.</p>
                                        <a href='../index.html' class='button'>DONE</a>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                </div>
        </td>
        <td></td>
    </tr>
</tbody></table>

<?php 
    // session_destroy();
?>
</body>
</html>