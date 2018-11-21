<?php 
session_start();
include("../inc_files/inventory.php");
$staff_id = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
<?php include("../inc_files/scripts.php");?>
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
        <p>&nbsp;</p>
          <?php include("menu.php");?>
        <div id="body-container">
          <div id="container">
           <h1>Sales Form </h1>
            <form action="" method="get">
              <div align="right" style="padding-right:20px;"><span class="style1"><span style="font-weight: bold"><a href="order.php" style="color:#390;">Make Order</a>&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="searchbox" id="searchbox" onkeyup="return search_prod(this.value);" placeholder="Search Product" />
              </span>&nbsp;            
              </div>
            </form>
            <div id="livesearch">
              <?php
$getrec = mysql_query ("SELECT * FROM product_sales ORDER BY product_id ASC") or die(mysql_error());?>
              <table width="95%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
                <thead>
                  <?php $sn = 1;?>
                  <tr>
                    <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='84'>Add to Sales</th>
                    <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
                    <th width="303" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
                    <th width="153" class='table-sortable:default table-sortable' title='Click to sort'>COST PRICE</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>SELLING PRICE</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY IN STOCK</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row= mysql_fetch_array($getrec)){
	$id = $row['product_id'];
	$name  = $row['product_name'];
	$cprice = $row['cost_price'];
	$sprice  = $row['selling_price'];
	$quantity  = $row['quantity'];
?>
                  <tr class=''>
                  <td> 
<?php 	
	// check if this product has been placed on order for current placement
	$check = mysql_query("SELECT * FROM tmp_order WHERE staff_id = '$staff_id' AND prod_id ='$id'") or die(mysql_error());
?>
<input name='<?php echo $id;?>' type='checkbox' value='<?php echo $id;?>' onclick='return pick_product(this.value)' id='<?php echo $id; ?>' <?php if(mysql_num_rows($check)){?>checked='checked'<?php }?> /></td>
                    <td><?php echo $sn;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $cprice;?></td>
                    <td><?php echo $sprice;?></td>
                    <td><?php echo $quantity;?></td>
                  </tr>
                  <?php $sn++; }?>
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
