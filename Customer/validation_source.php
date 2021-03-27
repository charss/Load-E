<?php 
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
		$network = '';
		$valid = false;

		if ($get_09 != "09") {
			echo "<script>alert('Invalid number. Please enter a valid mobile number that starts with 09.')</script>";
			return 0;
		} else if ($len != 11) {
			echo "<script>alert('Invalid Number. Make sure it is 11 numbers.')</script>";
			return 0;
		}

		$get_4dgt = substr($num, 0, 4);
		$get_5dgt = substr($num, 0, 5);
		// globetm, smart, sun, tnt, globe, tm, globepost
		if (in_array($get_4dgt, $globetm)) {
			$network = 'Globe/TM';
			$valid = true;
		} else if (in_array($get_4dgt, $smart)) {
			$network = 'Smart';
			$valid = true;
		} else if (in_array($get_4dgt, $sun)) {
			$network = 'Sun';
			$valid = true;
		} else if (in_array($get_4dgt, $tnt)) {
			$network = 'Talk n Text';
			$valid = true;
		} else if (in_array($get_4dgt, $globe)) {
			$network = 'Globe';
			$valid = true;
		} else if (in_array($get_4dgt, $tm)) {
			$network = 'TM';
			$valid = true;
		} else if (in_array($get_5dgt, $globepost)) {
			$network = 'Globe Postpaid';
			$valid = true;
		}

		if ($valid != true){
			echo "<script>alert('Invalid number. It is not connect to any network. Please try again.')</script><br>";
			return 0;
		} elseif ($valid == true) {
			echo "<script>alert('Valid number.')</script>"; 
			$_SESSION['network'] = $network;
			return true;
		}
	}
?>