<?php 
session_start();
include("inventory.php");
$id = $_GET['val'];
$get_price = mysql_query("SELECT * FROM product WHERE product_id ='$id'") or die();
$rsp = mysql_fetch_array($get_price);
$price = $rsp['selling_price'];?>
<input name="dprice" type="text" value="<?php echo $price;?>" id="dprice"/>