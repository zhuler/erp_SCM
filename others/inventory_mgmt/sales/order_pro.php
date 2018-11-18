<?php
session_start();
include('../inc_files/inventory.php');

if (isset($_POST['submit'])){
	$staff_id = $_SESSION['id'];
	$discount = $_POST['discount'];
	$total = $_POST['grand'];
	$amount = $_POST['collected'];
	$bal = $_POST['balance'];
	$cust = $_POST['skills'];
	$type = $_POST['mode'];
	$date = date("d/m/Y");
	$hr = date("h");
	$time = date($hr.":m:s");
	$check_receipt = mysql_query("SELECT receipt FROM sales ORDER BY id DESC") or die();
	$rs = mysql_fetch_array($check_receipt);
	$receipt = $rs['receipt'];
	$nreceipt = $receipt + 1;
	// get all sales by this staff
	$get_all = mysql_query("SELECT * FROM tmp_order WHERE staff_id = '$staff_id'") or die();
	while($row = mysql_fetch_array($get_all)){
		$prod_id = $row['prod_id'];
		$qty = $row['qty'];
		//echo $staff_id = $row['staff_id'];
		$add_sales = mysql_query("INSERT INTO sales (`product_id`, `staff_id`, `quantity`, `type`,`receipt`) 
		VALUES ('$prod_id', '$staff_id', '$qty', '$type', '$nreceipt')") or die();
		$update_quantity=mysql_query("UPDATE product_sales SET quantity=`quantity`-'$qty', status = '0' WHERE product_id='$prod_id'");
	}
	$sales_rec = mysql_query("INSERT INTO sales_rec (`receipt`, `customer`, `total`, `amount`, `balance`, `discount`, `date`, `time`) 
	VALUES ('$nreceipt', '$cust', '$total', '$amount', '$bal', '$discount','$date', '$time')") or die();
	
	$delete_rec = mysql_query("DELETE FROM tmp_order WHERE staff_id = '$staff_id'") or die();
	$_SESSION['$nreceipt'] = $nreceipt;
	header("location:receipt.php");
}
else{
	header("invalid.php");
}
?>