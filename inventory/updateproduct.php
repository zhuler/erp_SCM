<?php
include("db.php");
$proid=$_POST['ITEM'];
$itemnumber=$_POST['itemnumber'];
mysqli_query($bd,"UPDATE inventory SET qtyleft=qtyleft+'$itemnumber'
WHERE id='$proid'");
header("location: tableedit.php#page=addproitem");
?>