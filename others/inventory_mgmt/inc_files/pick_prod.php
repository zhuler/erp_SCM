<?php 
session_start();
include("inventory.php");
$prod_id = $_GET['q'];
$status = $_GET['p'];
$userid = $_SESSION['id'];
if($status=="check"){
	$addrec = mysql_query("INSERT INTO tmp_order (`prod_id`, `staff_id`) VALUES ('$prod_id', '$userid')") or die(mysql_error());
}
else{
	$del = mysql_query("DELETE FROM tmp_order WHERE staff_id=$userid && prod_id='$id'") or die(mysql_error());
}

?>