<?php
session_start();
include('../inc_files/inventory.php');
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];
$occupation = $_POST['occupation'];
$next = $_POST['nok'];
$nextaddress=$_POST['nokaddress'];
$nextphone=$_POST['nokphone'];
$save=mysql_query("INSERT INTO customer  (`sname`, `fname`, `mname`, `address`, `phone`, `sex`,`occupation`, `next_of_kin`, `nok_address`, `nok_phone`) VALUES ('$sname', '$fname', '$mname', '$address',  '$phone', '$sex', '$occupation','$next', '$nextaddress', '$nextphone')") or die(mysql_error());
$_SESSION['msg']="<font color='#390'>New Customer Registered Successfully</font>";
header('location:add_customer.php')
?>