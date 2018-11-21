<?php 
session_start();
include("../inc_files/inventory.php");
$pass = $_POST['new'];
$checker = $_POST['ckecker'];

if(isset($_POST['submit'])){
	if ($pass != $checker){
		$_SESSION['msg']="<font color='#fff'>Password Does Not Match..</font>";
		header("Location: settings.php");
	}
	$id = $_SESSION['id'];
	$ss=mysql_query("UPDATE staff SET password='$pass' WHERE staff_id = $id") or die(mysql_error());
	echo "Password changed successfully.";
	$_SESSION['msg']="<font color='#fff'>Password changed successfully..</font>";
	header("Location:../logout.php");
}
else{
	header("Location:invalid.php");
}
?>