<?php
include("inc_files/inventory.php");
$type = $_GET['type'];
if ($type == "customer"){
	// for product
	$cid = $_GET['cid'];
	$sname = $_GET['sname'];
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$add = $_GET['add'];
	$ph = $_GET['ph'];
	$occup = $_GET['occup'];
	$sex = $_GET['sex'];
	$nok = $_GET['nok'];
	$nok_add = $_GET['nok_add'];
	$nok_ph = $_GET['nok_ph'];
	$reg = $_GET['reg'];
	$date = $_GET['dt'];
	$time = $_GET['ti'];
	// check previous entry
	$check3 = mysql_query ("SELECT * FROM customer WHERE customer_id = $cid")or die(mysql_error());
	if (mysql_num_rows($check3)){
		$update_customer = mysql_query("UPDATE customer SET sname = '$sname', fname='$fname', mname='$mname', address='$add',  phone='$ph', sex='$sex',  occupation='$occup', next_of_kin='$nok',  nok_address='$nok_add',  nok_phone='$nok_ph', reg_by = '$reg', date = '$date', time = '$time' WHERE customer_id='$cid'") or die(mysql_error());
	}
	else{
		$inp_customer = mysql_query("INSERT INTO customer  (`customer_id`, `sname`, `fname`, `mname`, `address`, `phone`, `sex`,`occupation`, `next_of_kin`, `nok_address`, `nok_phone`, `date`, `time`, `reg_by`) 
		VALUES ('$cid', '$sname', '$fname', '$mname', '$add',  '$ph', '$sex', '$occup','$nok', '$nok_add', '$nok_ph','$date', '$time', '$reg')") or die(mysql_error());
	}
}

?>