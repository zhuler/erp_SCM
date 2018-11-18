<?php 
session_start();
$id = $_SESSION['id'];
include("inventory.php");
$pass = $_GET['q'];
$getuser = mysql_query("SELECT * FROM staff WHERE staff_id = '$id' AND password ='$pass'") or die (mysql_error());
if (mysql_num_rows($getuser)>0){
	echo '';
}
else {
	echo '<font color="#FF0000">Incorrect Password</font>';
}
?>