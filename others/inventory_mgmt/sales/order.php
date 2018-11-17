<?php 
ob_start();
session_start();
include("../inc_files/inventory.php");
$userid = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("../inc_files/scripts.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
<script type="text/javascript" language="javascript">
function checker(){
	var result = confirm("Do you really want to remove this product?");
	if(result == false){
		return false;	
	}
}

function favour(discount){
	var remain, sub_total;
	sub_total = document.getElementById("grand").value;	
	remain = sub_total - discount;
	document.getElementById("general").value = remain;	
}

function comp(str){
	var val, remain;
	val = document.getElementById("general").value;	
	remain = str - val;
	document.getElementById("balance").value = remain;	
}
  </script>
<script type="text/javascript" language="javascript">
function computation(str, sn, all_val, prod, staff){
	var all_val, all_vals, units, sub_vals, remains, total, results, stocks, quantity;
	units = "unit"+sn;
	stocks = "stock"+sn;
	units = document.getElementById(units).value;
	stocks = document.getElementById(stocks).value;

	quantity = "quantity"+sn;
	//document.getElementById(quantity).value=1;
	
	if(isNaN(str) || str==""){
		alert("Please only numbers are accepted, space is not allowed between number");
		document.getElementById(quantity).value=1;
		str = 1;
		document.getElementById(quantity).focus();
	}

	if(stocks < str){
		alert("Quantity in stock is lesser than qunatity to be puchased");
		var quantity = "quantity"+sn;
		document.getElementById(quantity).value=1;
		return false;
	}
	sub_vals = "sub"+sn;
	rem = document.getElementById(sub_vals).value;
	remains = document.getElementById("general").value - rem;
	results = units * str;
	document.getElementById(sub_vals).value = results;
	general = remains + results;
	document.getElementById("grand").value = general;
	document.getElementById("general").value = general;
	return addqty(prod, staff, str)
}
</script>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
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
          <?php include("menu.php");?>
        <div id="body-container">
          <div id="container">
           <h1>Make Order </h1>
              <div align="right" style="padding-right:20px;"><span class="style1"><a href="index.php" style="color:#390;"> &lt;&lt; Go to Previous Page</a></span>             </div>
            <div id="livesearch">
              <form action="order_pro.php" method="POST">
<?php
$getrec = mysql_query ("SELECT * FROM tmp_order WHERE staff_id = '$userid'") or die(mysql_error());
if (mysql_num_rows($getrec) == 0){
	header("Location:index.php");
}?>
              <table width="97%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
                <thead>
                  <?php $sn = 1;?>
                  <tr>
                    <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='68'>S/NO</th>
                    <th width="177" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
                    <th width="108" class='table-sortable:default table-sortable' title='Click to sort'>UNIT PRICE</th>
                    <th width="94" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY</th>
                    <th width="87" class='table-sortable:default table-sortable' title='Click to sort'>SUB TOTAL</th>
                    <th width="68" class='table-sortable:default table-sortable' title='Click to sort'>IN STOCK</th>
                    <th width="121" class='table-sortable:default table-sortable' title='Click to sort'>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $all = 0;
				  		$num = mysql_num_rows($getrec);
				  		while($row= mysql_fetch_array($getrec)){
						$prod_id = $row['prod_id'];
						// get remaining quantity in stock
						$in_stock = mysql_query("SELECT * FROM product_sales WHERE product_id = '$prod_id'") or die();
						$rsin = mysql_fetch_array($in_stock);
						$qty_stk = $rsin['quantity'];
						$qty = $row['qty'];
						$staff_id = $row['staff_id'];
						$get_prod = mysql_query("SELECT * FROM product WHERE product_id = $prod_id") or die(mysql_error());
						$rsprod = mysql_fetch_array($get_prod);
						$name  = $rsprod['product_name'];
						$sprice  = $rsprod['selling_price'];
						$sub = $qty * $sprice;
						$all = $all + $sub;
					?>
                  <tr class=''>
                    <td><?php echo $sn;?></td>
                    <td><?php echo $name;?></td>
                    <td><strong>#</strong><?php echo $sprice;?>
                      <input type="hidden" name="unit<?php echo $sn;?>" id="unit<?php echo $sn;?>" value="<?php echo $sprice;?>" /></td>
                    <td align="center"><input name="quantity<?php echo $sn;?>" type="text" value="<?php echo $qty;?>" id="quantity<?php echo $sn;?>" size="2" onkeyup="return computation(this.value,<?php echo $sn;?>, <?php echo $all;?>,  <?php echo $prod_id;?>, <?php echo $staff_id;?> );" /></td>
                    <!-- Sends Quantity, S/No, Sub Total, current product id, staff id  to computation function-->
                    <td align="center"><input name="sub<?php echo $sn;?>" type="text" id="sub<?php echo $sn;?>" size="2" value="<?php echo $sub;?>"  /></td>
                    <td><?php echo $qty_stk;?><input type="hidden" name="stock<?php echo $sn;?>" id="stock<?php echo $sn;?>" value="<?php echo $qty_stk;?>" /></td>
                    <td><a href="delete_sales.php?user=<?php echo $userid;?>&prod=<?php echo $prod_id;?>&num=<?php echo $num; ?>" onclick="return checker()" style="color:#390;" title="Delete <?php echo $name;?> from the sales product"><strong>Delete Entry</strong></a>
               <input type="hidden" name="prod<?php echo $sn;?>" id="prod" value="<?php echo $prod_id;?>" />
                <input type="hidden" name="user" id="user" value="<?php echo $staff_id;?>" />
                <input name="num" type="hidden" value="<?php echo $num;?>" /></td>
                  </tr>
                  <?php $sn++; }?>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td><strong>Mode of Payment</strong></td>
                    <td><select name="mode" id="mode" onchange="return gatpaytype(this.value);">
                      <option value="Cash" selected="selected">Cash</option>
                      <option value="Credit">Credit</option>
                    </select></td>
                    <td><strong>Sub Total</strong></td>
                    <td colspan="2"><b># </b>
                      <input name="grand" type="text" id="grand" size="5" value="<?php echo $all;?>" /></td>
                    <td><strong>Amount Collected</strong></td>
                  </tr>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td><strong>Customer Name</strong></td>
                    <td>&nbsp;</td>
                    <td><strong>Discount</strong></td>
                    <td colspan="2"><b>#</b>
<input name="discount" type="text" id="discount" size="5" value="0" onkeyup="return favour(this.value);" />                                                             </td>
                    <td><input name="collected" type="text" id="collected" size="5" onkeyup="return comp(this.value);" title="Type the amount collected in cash from customer while the balance will be calculated" required/></td>
                  </tr>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td colspan="2"> <div class="ui-widget" id="ui-widget">
            <label for="skills"></label>
            <input name="skills" type="text" id="skills" size="30" placeholder="Customer Name" title="Type in the customer name here" required/>
        </div>        </td>
                    <td><strong>Overall Total</strong></td>
                    <td colspan="2"><b>#</b>
                      <input name="general" type="text" id="general" size="5" value="<?php echo @$all - @$discount?>" /></td>
                    <td><strong>Balance</strong></td>
                  </tr>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="2" align="center">&nbsp;</td>
                    <td><input name="balance" type="text" id="balance" size="5" onkeyup="return favour(this.value);" /></td>
                  </tr>
                  <tr class=''>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="5" align="center"><label>
                      <input type="submit" name="submit" id="submit" value="Make Payment & Print Receipt" style="cursor:pointer;" title="Click here to print receipt after collection of money" />
                    </label></td>
                    </tr>
                </tbody>
              </table>              
              </form>
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
<?php ob_flush();?>