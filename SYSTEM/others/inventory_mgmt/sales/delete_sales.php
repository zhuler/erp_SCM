<?php
include('../inc_files/inventory.php');
$staff = $_GET['user'];
$prod = $_GET['prod'];

$delete = mysql_query("DELETE FROM tmp_order WHERE prod_id='$prod' AND staff_id = '$staff'") or die(mysql_error());
//exit;
header('location:order.php');
?>