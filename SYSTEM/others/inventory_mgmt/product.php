<?php
	include("inc_files/inventory.php");
	$type = $_GET['type'];

if ($type == "product"){
	// for product
	$pid = $_GET['pid'];
	$pname = $_GET['pname'];
	$cp = $_GET['cp'];
	$sp = $_GET['sp'];
	$sup = $_GET['sup'];
	$qty = $_GET['qty'];
	$date = $_GET['dt'];
	$time = $_GET['ti'];
	// check previous entry
	$check6 = mysql_query ("SELECT * FROM product WHERE product_id = $pid")or die(mysql_error());
	if (mysql_num_rows($check6)){
		$update_pro = mysql_query("UPDATE product SET product_name = '$pname', cost_price = '$cp', selling_price = '$sp', supplier = '$sup', quantity = '$qty', date = '$date', time = '$time' WHERE product_id = '$pid' ") or die(mysql_error());
	}
	else{
		$input6 = mysql_query("INSERT INTO product(`product_id`, `product_name`, `cost_price`, `selling_price`, `supplier`, `quantity`, `date`, `time`) 
		VALUES('$pid', '$pname', '$cp', '$sp', '$sup', '$qty','$date', '$time')") or die(mysql_error());
	}
}

?>
