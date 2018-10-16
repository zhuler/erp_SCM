<?php
include('../inc_files/inventory.php');
 
 $id=$_GET['delete'];

$update=mysql_query("DELETE FROM product WHERE product_id='$id' ") or die(mysql_error());
header('location:view_product.php')

?>