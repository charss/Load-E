<?php
	include_once 'conbar.php';
?>
<!DOCTYPE html>
<html>
<body>
<style>
.barcontainer {
  position: relative;
  border: 3px solid black;
  border-radius: 5px 5px 0 0;
  width: auto;
  margin: 0 auto;
  min-height: 25vw;
  max-height: 50vw;
  min-width: 40%;
  max-width: 60%;
  
}

.barcontainerheader {
  display: inline;
  position: absolute;
  width: 100%;
  padding-top: 3px;
  padding-bottom: 3px;
  background: #663399;
  border-bottom: 3px solid black;
  font-size: 1.5em;
  color: white;
  text-align: center;
  text-shadow: 2px 2px 0 black;
  z-index: 0;
}

.bar {
  position: absolute;
  display: inline-block;
  bottom: 0;
  border: 1px solid black;
  border-radius: 6px 6px 0 0;
  background: #663399;
  width: 10%;
  text-align: center;
  color: white;
  text-shadow: 1px 1px 0 black;
  box-shadow: 4px 0 8px #888;
}

.barlabel {
  position: absolute;
  border-top: 2px solid black;
  background: #888;
  bottom: 0;
  width: 100%;
  text-shadow: 1px 1px 0px black;
  color: white;
}

.bar:nth-child(2) {
  left: 5%;
}

.bar:nth-child(3) {
  left: 25%;
}

.bar:nth-child(4) {
  left: 45%;
}

.bar:nth-child(5) {
  left: 65%;
}

.bar:nth-child(6) {
  left: 85%;
}

h1 {
	text-align:center;
}

</style>

<?php
	$sql = "SELECT * FROM month;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	$x = 0;
	$height = array();
	$month = array();
	if ($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			$month[$x] = $row['b_month'];
			$height[$x] = $row['b_load'];
			$x+=1;
		}
	}
	$total = 0;
	$totalrows = $resultCheck;
	$heightdiv = array();
	
	for($i=0; $i<$totalrows; $i++){
		$total = $height[$i] + $total;
		
	}
	
	for($i=0; $i<$totalrows;$i++){
		$heightdiv[$i] = $height[$i]/$total;
		$heightdiv[$i] = $heightdiv[$i]*100;
	}
	

?>

<h1>Load E</h1>

<div class='barcontainer'>
  <div class='barcontainerheader'>
    Income in the last 5 months
  </div>
 <?php

 for($i=0; $i<$totalrows; $i++){
	echo nl2br("<div class='bar' style = 'height:$heightdiv[$i]"."%'".">"."$height[$i]"."<div class='barlabel'>"."$month[$i]"."</div></div>");  
 }
 
 ?>
  
 
</div>

</body>
</html>
