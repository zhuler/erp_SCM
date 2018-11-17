<?php
include("inc_files/inventory.php");
	// for product
	$id = $_GET['id'];
	$sid = $_GET['sid'];
	$reason = $_GET['reason'];
	$date = $_GET['dt'];
	$time = $_GET['ti'];
	// check previous entry
	$check5 = mysql_query ("SELECT * FROM barn_record WHERE ID_Num = $id") or die(mysql_error());
	if (mysql_num_rows($check5)){
		$update_barn = mysql_query("UPDATE barn_record SET staff_Id = '$sid', reason = '$reason', sDate = '$date', sTime = '$time' WHERE ID_Num = $id") or die(mysql_error());
	}
	else{
		$input5 = mysql_query("INSERT INTO barn_record(`ID_Num`, `staff_Id`, `reason`, `sDate`, `sTime`) 
		VALUES('$id', '$sid', '$reason', '$date', '$time')") or die(mysql_error());
	}
?>