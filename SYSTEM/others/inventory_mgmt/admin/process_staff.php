<?php
session_start();
include('../inc_files/inventory.php');
$sname=$_POST['surname'];
$fname=$_POST['firstname'];
$oname=$_POST['othernames'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pic = $phone.".jpg";
$sex=$_POST['sex'];
$category=$_POST['category'];
$passphoto="../passport/".$phone.".jpg";
move_uploaded_file($_FILES['passport']['tmp_name'],$passphoto);
$result="INSERT INTO staff  (`sname`, `fname`, `mname`, `address`, `email`, `phone`, `passport`, `sex`, `category`, `username`, `password`) 
VALUES ('$sname', '$fname', '$oname', '$address', '$email', '$phone', '$pic', '$sex', '$category','$sname', '$sname')";
$save=mysql_query($result) or die(mysql_error());
$_SESSION['msg']="<font color='#390'>New Staff Registered Successfully</font>";
header('location:add_staff.php');
?>