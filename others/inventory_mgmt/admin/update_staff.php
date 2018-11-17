<?php
include('../inc_files/inventory.php');
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$sex=$_POST['sex'];
$category=$_POST['category'];
$id=$_POST['id'];
$pic = $phone.".jpg";
$passphoto="../passport/".$phone.".jpg";
move_uploaded_file($_FILES['passport']['tmp_name'],$passphoto);

$update=mysql_query("UPDATE staff SET sname = '$sname', fname='$fname', mname='$mname', address='$address',  email='$email', phone='$phone', sex='$sex', category='$category' , passport='$pic', st = '0' WHERE staff_id='$id'") or die(mysql_error());
header('location:view_staff.php');
?>