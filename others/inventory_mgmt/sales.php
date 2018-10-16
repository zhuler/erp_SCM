<?php
include("inc_files/inventory.php");
$type = $_GET['type'];
if($type == "sales"){
	// for sales
	$id = $_GET['id'];
	$receipt = $_GET['r'];
	$pid = $_GET['pid'];
	$sid = $_GET['sid'];
	$qty = $_GET['qty'];
	$kind = $_GET['kind'];
	
	// check previous entry
	$check1 = mysql_query ("SELECT * FROM sales WHERE id = $id");
	if (mysql_num_rows($check1)){
		$update_sales = mysql_query("UPDATE sales SET product_id = '$pid', staff_id = '$sid', quantity = '$qty', type = '$kind', receipt = '$receipt' WHERE id = '$id' ") or die(mysql_error());
	}
	else{
		$add_sales_rec = mysql_query("INSERT INTO sales (`id`, `product_id`, `staff_id`, `quantity`, `type`,`receipt`) 
		VALUES ('$id', '$pid', '$sid', '$qty', '$kind', '$receipt')") or die(mysql_error());
	}
}
?>