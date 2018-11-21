<?php
include("../inc_files/inventory.php");
@$status = $_POST['status'];
$id = $_POST['id'];
$dates = date("d/m/Y");
$hr = date("h");
$times = date($hr.":i:s");
if ($status == "Active"){
	$remove = mysql_query("UPDATE staff SET Status = 'Barned', st = '0' WHERE staff_id = '$id'") or die(mysql_error());
	$addbarn = mysql_query("INSERT INTO barn_record (`Staff_Id`, `sDate`, `sTime`) VALUES ('$id', '$dates', '$times')")or die(mysql_error());
}
if ($status == "Barned"){
	$remove = mysql_query("UPDATE staff SET Status = 'Active', st = '0' WHERE staff_id = '$id'") or die(mysql_error());
}
	header("Location:view_staff.php");

?>