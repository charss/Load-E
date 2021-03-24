<!DOCTYPE html>
<html>
<body>

<h3>Welcome to Load-E</h3>
    <form name='form' action='' method='post'>
            Enter Number: <input type="number" name="num" id='num'><br><br>
            Enter Load: <input type="number" name="load" id='load'><br><br>
            Enter Cash: <input type="number" name="cash" id='cash'><br><br>
            <input type="submit" name="submit" value="Load">
        </form>
    
    

<?php
    $num = '';
    $check = $load = $cash = 0;
	
	$globetm = array("0905", "0906", "0915", "0916", "0917", "0926", "0927", "0935", "0936", "0937", "0945", "0953", "0954", "0955", "0956", "0965", "0966",
                "0967", "0975", "0977", "0978", "0979", "0995", "0996", "0997");
    $globepost = array("09173", "09175", "09176", "09178", "09253", "09255", "09256", "09257", "09258");
    $smart = array("0908", "0918", "0919", "0920", "0921", "0928", "0929", "0939", "0947", "0949", "0951", "0961", "0998", "0999");
    $sun = array("0922", "0923", "0924", "0925", "0931", "0932", "0933", "0934", "0940", "0941", "0942", "0943", "0973", "0974");
    $tnt = array("0907", "0909", "0910", "0912", "0930", "0938", "0946", "0948", "0950");
	
    
    if(isset($_POST['submit'])){ 
                $num = $_POST['num'];
                $load = $_POST['load'];
                $cash = $_POST['cash'];
                $check = 1;
                
    }
    
    $len = strlen($num);
    $get_09 = substr($num,0,2);
    
    
    if ($check == 1){
        if (($len==11) and ($get_09=="09")){
            //echo "Valid Number"."<br>";
            $check = 2;
        }
        elseif ($get_09!="09"){
            echo "Invalid Number. Please enter a valid mobile number starts with 09."."<br>";
        }
        else{
            echo "Invalid Number. Make sure it is 11 numbers."."<br>";
        }
    
        
    }
    $total=0;
    if ($check==2){
		
        $total = $cash - $load;
        if ($total<0){
            echo "Cash must be higher than your preferred load."."<br>";
        }
        else{
            $check = 3;
        }
    }
	
	$get_4dgt = substr($num, 0, 4);
    $get_5dgt = substr($num, 0, 5);
	
	while ($check == 3){
		$len = count($globetm);
		$invalid = 0;
		for($i=0; $i<$len; $i++){
			if ($get_4dgt == $globetm[$i]){
				echo "Your network is Globe/TM<br>";
				$check=4; $invalid = 1;
			}
			
			
		}
		
		$len = count($globepost);
		for($i=0; $i<$len; $i++){
			if ($get_5dgt == $globepost[$i]){
				echo "Your network is Globe Postpaid<br>";
				$check=4;$invalid = 1; 
			}
			
			
		}
		
		$len = count($smart);
		for($i=0; $i<$len; $i++){
			if ($get_4dgt == $smart[$i]){
				echo "Your network is Smart<br>";
				$check=4;$invalid = 1;
			}
			
		}
		
		$len = count($sun);
		for($i=0; $i<$len; $i++){
			if ($get_4dgt == $sun[$i]){
				echo "Your network is Sun<br>";
				$check=4;$invalid = 1; 
			}
			
			
		}
		
		$len = count($tnt);
		for($i=0; $i<$len; $i++){
			if ($get_4dgt == $tnt[$i]){
				echo "Your network is Talk N Text<br>";
				$check=4; $invalid = 1;
			}
			
			
		}
		if ($invalid == 0){
			echo "Invalid Network. <br>";
			break;
		}
		
		
	}
	
	if ($check==4){
		echo "You have successfully loaded ".$load." pesos in the mobile number ".$num.".<br> Your change is ".$total." pesos. Thank you!"."<br>";
	}
?>

</body>
</html>
