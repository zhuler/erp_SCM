<?php
include("inc_files/inventory.php");
$type = $_GET['type'];

if ($type == "prod_sales"){
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
	$check2 = mysql_query ("SELECT * FROM product_sales WHERE product_id = $pid")or die(mysql_error());
	if (mysql_num_rows($check2)){
		$update_pro_sales = mysql_query("UPDATE product_sales SET product_name = '$pname', cost_price = '$cp', selling_price = '$sp', supplier = '$sup', quantity = '$qty', date = '$date', time = '$time', status = '0' WHERE product_id = '$pid' ") or die(mysql_error());
	}
	else{
		$input_pro_sales = mysql_query("INSERT INTO product_sales(`product_id`, `product_name`, `cost_price`, `selling_price`, `supplier`, `quantity`, `date`, `time`) 
		VALUES('$pid', '$pname', '$cp', '$sp', '$sup', '$qty','$date', '$time')") or die(mysql_error());
	}
}
?>