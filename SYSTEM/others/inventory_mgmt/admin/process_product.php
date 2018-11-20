<?php
	session_start();
	include('../inc_files/inventory.php');
	$name=$_POST['name'];
	$cprice=$_POST['costp'];
	$sprice=$_POST['sellingp'];
	$supplier=$_POST['supplier'];
	$quantity=$_POST['quantity'];
	$date=date('d.m.Y');
	$hr = time("h")+1;
	$time=time($hr.":m:s");
	// check previous produc entry
	$check = mysql_query ("SELECT * FROM product WHERE product_name = '$name'") or die();
	$row = mysql_fetch_array($check);
	if (mysql_num_rows($check)){
		$pro_id = $row['product_id'];
		$new_qty = $row['quantity']+$quantity;
		$upd_pro = mysql_query("UPDATE product_sales SET quantity = '$new_qty', status = '0' WHERE product_id = '$pro_id'") or die();
		
		$input = mysql_query("INSERT INTO product(`product_name`, `cost_price`, `selling_price`, `supplier`, `quantity`, `date`, `time`) 
		VALUES('$name', '$cprice', '$sprice', '$supplier', '$quantity','$date', '$time')") or die(mysql_error());
	}
	else{
		$input = mysql_query("INSERT INTO product(`product_name`, `cost_price`, `selling_price`, `supplier`, `quantity`, `date`, `time`) 
		VALUES('$name', '$cprice', '$sprice', '$supplier', '$quantity','$date', '$time')") or die(mysql_error());
		
		$input2 = mysql_query("INSERT INTO product_sales(`product_name`, `cost_price`, `selling_price`, `supplier`, `quantity`, `date`, `time`) 
		VALUES('$name', '$cprice', '$sprice', '$supplier', '$quantity','$date', '$time')") or die(mysql_error());
		$_SESSION['msg']="<font color='#390'>New Product Registered Successfully</font>";
	}
	header('location:add_product.php');
?>
