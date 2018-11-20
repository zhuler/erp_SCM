<?php
include('../inc_files/inventory.php');
echo $name=$_POST['name'];
echo $cost=$_POST['costp'];
echo $selling=$_POST['sellingp'];
echo $supplier=$_POST['supplier'];
echo $quantity=$_POST['quantity'];
$id=$_POST['id'];
$update=mysql_query("UPDATE product SET product_name = '$name', cost_price='$cost',  selling_price='$selling', supplier='$supplier', quantity='$quantity', status = '0' WHERE product_id='$id'") or die(mysql_error());
header('location:view_product.php')

?>