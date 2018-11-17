<?php
include('../inc_files/inventory.php');
 
$id=$_GET['delete'];

$update=mysql_query("DELETE FROM staff WHERE staff_id='$id' ") or die(mysql_error());
//exit;
header('location:view_staff.php');
?>