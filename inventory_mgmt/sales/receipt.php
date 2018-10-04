<?php
session_start();
$user = $_SESSION['id'];
include("../inc_files/inventory.php");
// get logged in sales manager
$get_user = mysql_query("SELECT * FROM staff WHERE staff_id = '$user'") or die(mysql_error());
$rsU = mysql_fetch_array($get_user);
$sname = $rsU['sname'];
$fname = $rsU['fname'];
$mname = $rsU['mname'];
$staff = $sname." ".$fname." ".$mname;
include('../inc_files/inventory.php');
$nreceipt = $_SESSION['$nreceipt'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
<link href="../style/receipt.css" rel="stylesheet" type="text/css" />
</head>

<body onload="window.print()">
<div class="receipt">
  <p align="center" style="font-size:14px;"><b>Bello Owu Investement</b><br /> (Subsidiary of Lat-Kay Nigeria Enterprises) <br />
  Km 1 Igosun/Afelele Road Offa, Kwara State</p>
  <font style="float:left"> Staff : <?php echo ucwords(strtolower($staff));?></font>
  <font style="float:right"> Receipt No: <?php echo $nreceipt;?></font>
  <table width="270px" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="14%">S/No</td>
        <td width="51%">Product</td>
        <td width="11%">Qty</td>
        <td width="24%">Sub</td>
    </tr>
      <?php 
	  $get_sales = mysql_query("SELECT * FROM sales WHERE receipt = '$nreceipt'") or die();
	  $sn = 1;
	  $tot=0;
	  while($rsg = mysql_fetch_array($get_sales)){
	  $pro = $rsg['product_id'];
	  $qty = $rsg['quantity'];
	  $get_prod = mysql_query("SELECT * FROM product WHERE product_id = '$pro'") or die();
	  $rspro = mysql_fetch_array($get_prod);
	  $pro_name = $rspro['product_name'];
	  $sprice = $rspro['selling_price'];
	  $get_details = mysql_query("SELECT * FROM sales_rec WHERE receipt = '$nreceipt'") or die();
	  $row=mysql_fetch_array($get_details);
	  $amount=$row['amount'];
	  $customer=$row['customer'];
	  $change=$row['balance'];
	  $discount=$row['discount'];
	  $sub=$sprice * $qty;
	  ?>
      <tr>
        <td><?php echo $sn;?></td>
        <td valign="top"><?php echo $pro_name;?></td>
        <td><?php echo $qty;?></td>
        <td>#<?php echo $sub?></td>
      </tr>
      <?php $sn = $sn + 1;}?>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="right">Total: &nbsp;</td>
        <td>#<?php echo $tot = $tot + $sub; ?> </td>       
      </tr>
      <?php if($discount!=0){?>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="right">Discount: &nbsp;</td>
      <td>#<?php echo $discount;?>      </tr>
      <?php } ?>
      <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right">Amount Paid: &nbsp;</td>
      <td>#<?php echo $amount;?>      </tr>
      <?php if($change!=0){
		   ?>
      <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right">Change: &nbsp;</td>
      <td>#<?php echo $change;?>      </tr>
      <?php }?>
      <tr>
        <td colspan="4" align="center">Customer Name: <?php echo $customer; ?></td>
    </tr>
    </table>
<p>Thanks for your patronage</p>
    <p align="center"><?php $hr = date("h")+1;?><?php $m = date("m");?> <?php echo date("d/m/Y");?> &nbsp;<?php echo date($hr.":".$m.":s");?></p>
</div>
</body>
</html>
