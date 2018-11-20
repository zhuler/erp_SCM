<?php 
session_start();
include("../inc_files/inventory.php");
$receipt = $_SESSION['r_id'];
$get_sales = mysql_query("SELECT * FROM sales WHERE receipt = '$receipt'") or die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/livesearch.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
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
<?php $getrec = mysql_query("SELECT * FROM sales_rec WHERE receipt = '$receipt'") or die(mysql_error());
$rsrec = mysql_fetch_array($getrec);
$cust = $rsrec['customer'];
if (is_numeric($cust)){
	$get_cust = mysql_query("SELECT * FROM customer WHERE customer_id = '$cust'") or die(mysql_error());
	$cs = mysql_fetch_array($get_cust);
	$csname = $cs['sname'];
	$cfname = $cs['fname'];
	$cmname = $cs['mname'];
	$cust = $csname." ".$cfname." ".$cmname;
}
$date = $rsrec['date'];
?>
           <h1>Sales Record for <?php echo ucwords(strtolower($cust));?> on <?php echo $date;?></h1>
           <div id="livesearch">
<table width="85%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
                <thead>
                  <?php $sn = 1;?>
                  <tr>
                    <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
                    <th width="281" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
                    <th width="101" class='table-sortable:default table-sortable' title='Click to sort'>UNIT PRICE</th>
                    <th width="103" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY</th>
                    <th width="100" class='table-sortable:default table-sortable' title='Click to sort'>SUB TOTAL</th>
                  </tr>
                </thead>
                <tbody>
				<?php $nsub = 0;
				while($row = mysql_fetch_array($get_sales)){
					$prod_id = $row['product_id'];
					$qty = $row['quantity'];
					$get_prod = mysql_query("SELECT * FROM product WHERE product_id = '$prod_id'") or die();
					$rs = mysql_fetch_array($get_prod);
					$prod_name = $rs['product_name'];
					$sprice = $rs['selling_price'];
					$amount = $rsrec['amount'];
					$discount = $rsrec['discount'];
				?>
                  <tr class=''>
                    <td><?php echo $sn;?></td>
                    <td><?php echo $prod_name;?></td>
                    <td align="right"><strong>#</strong><?php echo number_format($sprice);?></td>
                    <td align="right"><?php echo $qty;
					$sub = $sprice * $qty;?></td>
                    <td align="right"><strong>#</strong><?php echo number_format($sub);
					$nsub = $nsub + $sub;?></td>
                  </tr>
                  <?php $sn++; }?>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td align="right"><strong>Sub Total</strong></td>
                    <td align="right" style="color:#390;"><strong>#</strong><?php echo number_format($nsub);?></td>
                  </tr>
                 <?php if ($discount){?> <tr class=''>
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td align="right" style="color:#390;">&nbsp;</td>
                    <td align="right"><strong>Discount</strong></td>
                    <td align="right" style="color:#390;"><strong>#</strong><?php echo number_format($discount);?></td>
                  </tr>
                  <?php } ?>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td colspan="2" align="right"><strong>Amount Paid</strong></td>
                    <td align="right" style="color:#390;"><strong>#</strong><?php echo number_format($amount);?></td>
                  </tr>
                </tbody>
              </table>
           </div>          
          </div>
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