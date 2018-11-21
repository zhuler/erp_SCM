<?php 
session_start();
include("inc_files/inventory.php");
$id = $_SESSION['id'];
$hr = date("h")+1;
$time = date ($hr.':i:s');

$track = mysql_query("UPDATE log_details SET status = '1', logout_time = '$time' WHERE `user_id` = '$id'") or die(mysql_error());

unset($_SESSION['id']);
session_destroy();

session_start();
$_SESSION['msg'] = "<font color='#FF0000'><b>You have successfully logged out.!</b></font>";
header("Location:index.php");
?>