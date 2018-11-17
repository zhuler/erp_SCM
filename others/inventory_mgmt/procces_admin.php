<?php
ob_start();
session_start();
include('inc_files/inventory.php');
$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password = $_POST['password'];
$day = date('d')+1;
$date = date ($day.'/m/Y');
$hr = date("h")+1;
$time = date ($hr.':i:s');

$search = mysql_query("SELECT * FROM staff WHERE username = '$username' AND password = '$password'");
$row = mysql_fetch_array($search);
if (mysql_num_rows($search)){
$_SESSION['id'] = $row['staff_id'];
$_SESSION['utype'] = $row['category'];
$_SESSION['sname'] = $row['sname'];
$_SESSION['pass'] = $row['passport'];
if($row['status'] == "Barned"){
	$_SESSION['msg']="<font color='#FF0000'><b>This User has been barned.!</b></font>";
	header("Location:index.php");
}
else{
	// check current daily login
	$check_log = mysql_query("SELECT * FROM log_details WHERE user_id = '$_SESSION[id]' AND date = '$date' AND status = '0'");
	if(mysql_num_rows($check_log)>0){
		$id = $_SESSION['id'];		
		$track = mysql_query("UPDATE log_details SET status = '1', logout_time = '$time' WHERE `user_id` = '$id'");
	}
	// ensure a user can not login from more than one system
	$track = mysql_query("INSERT INTO log_details (`user_id`, `date`, `login_time`, `status`) 
	VALUES ('$_SESSION[id]', '$date', '$time', '0')");
	if($usertype == 'Administrator'){
		header('location:admin/index.php');
	}
	elseif($usertype == 'Sales Manager'){
		header('location:sales/index.php');
	}
	elseif($usertype == ''){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['msg'] = "<font color='#FF0000'><b>You Have Not Selected Any Category</b></font>";
		header('location:index.php');
	}
}
}
else{
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['msg']="<font color='#FF0000'><b>Invalid Login Credentials<b></font>";
	header("Location:index.php");
}
ob_flush();
?>