<?php
include('inventory.php');
$qty =  $_GET['q'];
$pro =  $_GET['p'];
$staff =  $_GET['s'];
$update = mysql_query("UPDATE tmp_order SET qty = '$qty' WHERE staff_id = '$staff' AND prod_id = '$pro'") or die(mysql_error());
?>