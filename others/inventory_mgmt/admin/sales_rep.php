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
<link rel="stylesheet" type="text/css" href="../style/tcal.css" />
<script type="text/javascript" src="../scripts/tcal.js"></script>
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
<form name="form1" action="#" method="post" id="form1">
  <div align="right" ><b>Start Date</b>
      <input name="start_date" type="text" id="start_date" size="10" placeholder="Start Date" class="tcal" required />
      <b>To Date</b>
        <input name="to_date" class="tcal" type="text" id="to_date" size="10" placeholder="To Date" />
      <input type="button" name="submit" id="button" value="View Report Range" onclick="return get_general_range();" title="Click here to view the report of selected range"/>
    </div>
</form>
<div id="livesearch">
<?php
$getrec = mysql_query ("SELECT * FROM sales_rec ORDER BY id DESC") or die(mysql_error());?>
<table width="100%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
<thead>
<?php $sn = 1;?>
<tr><th width="9%" class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort'>S/NO</td>
<th width="29%" class='table-sortable:default table-sortable' title='Click to sort'></td>NAME
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort'>TYPE
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort'>TOTAL</td>
<th width="6%" class='table-sortable:default table-sortable' title='Click to sort'>AMOUNT
<th width="6%" class='table-sortable:default table-sortable' title='Click to sort'>DISCOUNT
<th width="12%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">BALANCE</td>
<th width="9%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">DATE</td></tr></thead>
<tbody>
<?php 
	$nbal = 0;
	$ntotal = 0;
	$namount = 0;
	$ndiscount = 0;
	while($row= mysql_fetch_array($getrec)){
	$ID = $row['id'];
	$receipt  = $row['receipt'];
	$customer  = $row['customer'];
	$total = $row['total'];
	$amount = $row['amount'];
	$balance = $row['balance'];
	$discount = $row['discount'];
	$date = $row['date'];
	$time = $row['time'];?>
	<tr class=''>
    <td><?php echo $sn;?></td>
    <td><a href="tmp_eradicate.php?id=<?php echo $receipt;?>&type=view_details" style="color:#390;" title="Click here to view sales product breakdown"><?php
	if (is_numeric($customer)){
		$get_cust = mysql_query("SELECT * FROM customer WHERE customer_id = '$customer'") or die(mysql_error());
		$cs = mysql_fetch_array($get_cust);
		$csname = $cs['sname'];
		$cfname = $cs['fname'];
		$cmname = $cs['mname'];
		$cname = $csname." ".$cfname." ".$cmname;
		echo $cname;
	}
	else{
		echo $customer;
	}?></a></td>
    <?php $get_type = mysql_query("SELECT type FROM sales WHERE receipt = '$receipt'")or die();
	$rst = mysql_fetch_array($get_type);
	$type = $rst['type'];
	?>
    <td><?php echo $type;?></td>
    <td align="right"><?php echo number_format($total);
	$ntotal = $ntotal + $total;?></td>
    <td align="right"><?php echo number_format($amount);
	$namount = $namount + $amount;?></td>
    <td align="right"><?php echo number_format($discount);
	$ndiscount = $ndiscount + $discount;?></td>
    <td align="right"><?php if ($balance < 0) {
		echo number_format(substr($balance,1));
		$nbal = $nbal + $balance;
	}?></td>
    <td><?php echo $date;?></td></tr>
	<?php $sn++;	
}?>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td style="color:#390;" align="right"><b>#<?php echo number_format($ntotal);?></b></td>
	  <td align="right" style="color:#390;"><b>#<?php echo number_format($namount);?></b></td>
	  <td align="right" style="color:#390;"><b>#<?php echo number_format($ndiscount);?></b></td>
	  <td style="color:#390;" align="right"><b>#<?php echo number_format(substr($nbal,1));?></b></td>
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