<?php 
session_start();
include("../inc_files/inventory.php");
$get_prod = mysql_query("SELECT * FROM product") or die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/livesearch.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="../scripts/table.js"></script>
<script type="text/javascript" src="../scripts/gs_sortable.js"></script>
<script type="text/javascript">
<!--
var TSort_Data = new Array ('TABLE_2', 'i', 's', 's', 'i', 'i', 's', 'i');
tsRegister();
// -->
</script>
<link rel="stylesheet" type="text/css" href="../style/table.css" media="all">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
<script type="text/javascript" language="javascript">
function compared(str){
	alert(str);
	var price = document.getElementById("dprice").value;
	alert(price);
	var total;
	total = price * str;
	alert("Y");
	document.getElementById("total").value = total;	
}
</script>
</head>
<body>
<div id="outermost">
  <div id="in-outermost">
    <div id="wrapper">
      <div id="in-wrapper">
        <div id="banner">
          <?php include("../inc_files/header.php");?>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
          <?php include("menu.php");?>
        <div id="body-container">
          <div id="container">
           <h1>Sales Report </h1>
           <div id="livesearch">
              <?php
$getrec = mysql_query ("SELECT * FROM sales_rec ORDER BY id DESC") or die(mysql_error());?>
              <table width="100%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
  <thead>
<?php $sn = 1;?>
<tr><th width="9%" class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort'>S/NO</td>
<th width="11%" class='table-sortable:default table-sortable' title='Click to sort'>RECEIPT
<th width="29%" class='table-sortable:default table-sortable' title='Click to sort'></td>NAME
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort'>TYPE
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort'>TOTAL</td>
<th width="12%" class='table-sortable:default table-sortable' title='Click to sort'>AMOUNT
<th width="12%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">BALANCE</td>
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">DATE</td></tr></thead>
<tbody>
<?php 
	$sumtotal = 0;
	$sumpaid = 0;
	$sumbal = 0;
	while($row= mysql_fetch_array($getrec)){
	$ID = $row['id'];
	$receipt  = $row['receipt'];
	$customer  = $row['customer'];
	$amount = $row['amount'];
	$balance = $row['balance'];
	$discount = $row['discount'];
	$date = $row['date'];
	$time = $row['time'];?>
	<tr class=''>
    <td><?php echo $sn;?></td>
    <td><?php echo $receipt;?></td>
    <td><?php
	$general = $tamount + $consult;
	$sumtotal = $sumtotal + $general;
	$sumbal = $sumbal + $balance;
	$sumpaid = $sumpaid + $amount;
	echo $customer;?></td>
    <?php $get_type = mysql_query("SELECT type FROM sales WHERE receipt = '$receipt'")or die();
	$rst = mysql_fetch_array($get_type);
	$type = $rst['type'];
	?>
    <td><?php echo $type;?></td>
    <td align="right"><?php echo number_format($general);?></td>
    <td align="right"><?php echo number_format($amount);?></td>
    <td align="right"><?php echo number_format($balance);?></td>
    <td><?php echo $date;?></td></tr>
	<?php $sn++;	
}?>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td style="color:#390;" align="right"><b>#<?php echo number_format($sumtotal);?></b></td>
	  <td style="color:#390;" align="right"><b>#<?php echo number_format($sumpaid);?></b></td>
	  <td style="color:#390;" align="right"><b>#<?php echo number_format($sumbal);?></b></td>
	  <td>&nbsp;</td>
	  </tr> 
</tbody>
</table>
</div>          </div>
        </div>
        </div>
                <?php include ("../inc_files/copyright.php"); ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php $_SESSION['msg'] = "";?>