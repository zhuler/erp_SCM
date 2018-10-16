<?php
include("inc_files/inventory.php");
$type = $_GET['type'];
if ($type == "staff"){
	// for product
	$sid = $_GET['sid'];
	$sname = $_GET['sname'];
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$cat = $_GET['cat'];
	$add = $_GET['add'];
	$ph = $_GET['ph'];
	$em = $_GET['em'];
	$passp = $_GET['passp'];
	$stat = $_GET['stat'];
	$sex = $_GET['sex'];
	$uname = $_GET['uname'];
	$pass = $_GET['pass'];
	// check previous entry
	$check4 = mysql_query ("SELECT * FROM staff WHERE staff_id = $sid")or die(mysql_error());
	if (mysql_num_rows($check4)){
		$update_staff = mysql_query("UPDATE staff SET sname = '$sname', fname='$fname', mname='$mname', address='$add',  email='$em', phone='$ph', sex='$sex', category='$cat', passport='$passp', username = '$uname', password = '$pass' WHERE staff_id=$sid") or die(mysql_error());
	}
	else{
		$staff = mysql_query("INSERT INTO staff  (`staff_id`, `sname`, `fname`, `mname`, `category`, `address`, `email`, `phone`, `passport`, `status`, `sex`,  `username`, `password`) 
		VALUES ('$sid', '$sname', '$fname', '$mname', '$cat', '$add', '$em', '$ph', '$passp', '$stat', '$sex', '$uname', '$pass')") or die(mysql_error());
	}
}
?>