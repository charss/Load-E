<!DOCTYPE html>
<html>
<body>

<style>

.center {
  margin-left: auto;
  margin-right: auto;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: center;
}
h3 {
	text-align: center;
}
</style>


<h3>Income</h3>
<?php
	//iko-connect pa yata 'to sa database so mga variable muna gawin ko
	$income = 6500;
	$vendor = "Theresita";

?>

<table style="width:auto" class="center">
 
  <tr>
    <th><?php echo $income; ?></th>
  </tr>
  <tr>
    <td>Vendor:<br><?php echo $vendor;?></td>
  </tr>
 
</table>



</body>
</html>