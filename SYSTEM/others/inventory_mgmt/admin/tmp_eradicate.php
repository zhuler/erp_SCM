<?php
session_start();
if ($_GET['type'] == "modify_staff"){
	$_SESSION['s_id'] = $_GET['modify']; 
	header("Location:modify_staff.php");
}
if ($_GET['type'] == "modify_pro"){
	$_SESSION['prod_id'] = $_GET['modify']; 
	header("Location:modify_product.php");
}
if ($_GET['type'] == "modify_cust"){
	$_SESSION['cust_id'] = $_GET['modify']; 
	header("Location:modify_customer.php");
}
if ($_GET['type'] == "view_details"){
	$_SESSION['receipt'] = $_GET['id']; 
	header("Location:view_details.php");
}
?>