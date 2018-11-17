<?php
include('../connection/inventory.php');
 $fname=$_POST['firstname'];
   $lname=$_POST['lastname'];
    $mname=$_POST['middlename'];
   $address=$_POST['address'];
  $phone=$_POST['phone'];
 $sex=$_POST['sex'];
   $occupation=$_POST['occupation'];
   $nextok=$_POST['nok'];
      $nokaddress=$_POST['nokaddress'];
	 $nokphone=$_POST['nokphone'];

$id=$_POST['id'];
$update=mysql_query("UPDATE customer SET first_name = '$fname', last_name='$lname', middle_name='$mname', address='$address',  phone='$phone', sex='$sex',  occupation='$occupation', next_of_kin='$nextok',  nok_address='$nokaddress',  nok_phone='$nokphone', status = '0' WHERE customer_id='$id'") or die(mysql_error());
header('location:view_customer.php');
?>