<?php
	include("inc_files/inventory.php");
	$type = $_GET['type'];
	// for sales rec
	$id = $_GET['id'];
	$receipt = $_GET['r'];
	$customer = $_GET['c'];
	$total = $_GET['t'];
	$amount = $_GET['a'];
	$balance = $_GET['b'];
	$discount = $_GET['d'];
	$date = $_GET['dt'];
	$time = $_GET['ti'];
	// check previous entry
	$check = mysql_query ("SELECT * FROM sales_rec WHERE id = $id") or die(mysql_error());
	if (mysql_num_rows($check)){
		$update_sales_rec = mysql_query("UPDATE sales_rec SET receipt = '$receipt', customer = '$customer', total = '$total', amount = '$amount', balance = '$balance', discount = '$discount', date = '$date', time = '$time' WHERE id = '$id' ")or die(mysql_error());
	}
	else{
		$add_sales_rec = mysql_query("INSERT INTO sales_rec (`id`, `receipt`, `customer`, `total`, `amount`, `balance`, `discount`, `date`, `time`) 
		VALUES ('$id', '$receipt', '$customer', '$total', '$amount', '$balance', '$discount','$date', '$time')")or die(mysql_error());
	}
?>