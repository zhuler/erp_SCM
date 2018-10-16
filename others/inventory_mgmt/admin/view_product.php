<?php
include('../inc_files/inventory.php');
$veiw=mysql_query("SELECT * FROM product") or die(mysql_error());

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
<script type="text/javascript" language="javascript">
function check(){
	var res = confirm("Are you sure you want to permanently remove this product?");
	if(res == false){
		return false;	
	}
}
  </script>
<script type="text/javascript" language="javascript">
function computation(str){
	var units = document.getElementById("unit").value;
	var total;
	total = units * str;
	alert(total);
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
        <h1> View Product</h1>  
            <form action="" method="get">
              <div align="right" style="padding-right:20px;"><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="searchbox" id="searchbox" onkeyup="return stock_search(this.value);" placeholder="Search Product" />
              </span>              </div>
            </form>
            <div id="livesearch">
              
              <table width="95%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
                <thead>
                  <?php $sn = 1;?>
                  <tr>
                    <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
                    <th width="303" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
                    <th width="153" class='table-sortable:default table-sortable' title='Click to sort'>SELLING PRICE</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>COST PRICE</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>SUPPLIER</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY</th>
                    <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
		  $sn=1;
		  while($row=mysql_fetch_array($veiw)){
			  $name=$row['product_name'];
			  $cost=$row['cost_price'];
			  $selling=$row['selling_price'];
			  $supplier=$row['supplier'];
			  $quantity=$row['quantity'];
		 
		 ?>
                  <tr class=''>
                    <td><?php echo $sn ;?></td>
                    <td><?php echo $name ;?></td>
                    <td><?php echo $selling;?></td>
                    <td><?php echo $cost ;?></td>
                    <td><?php echo $supplier;?>&nbsp;</td>
                    <td><?php echo $quantity ?>&nbsp;</td>
                    <td valign="bottom"><form id="form1" name="form1" method="get" action="tmp_eradicate.php">
      <input type="submit" name="" id="modify" value="Modify" title="Modify Selected User Details" style="cursor:pointer"/>
      <input type="hidden" name="modify" id="modify" value="<?php echo $row['product_id']; ?>" />
      <input type="hidden" name="type" id="type" value="modify_pro" />
                    </form>
    <form name="form3" id="form3" action="delete_product.php" method="get" onsubmit="return check();">
      <input name="submit" type="submit" id="submit" value="Delete"  title="Deletes Selected Product" style="cursor:pointer" />
      <input type="hidden" name="delete" id="delete"  value="<?php echo $row['product_id']; ?>"/>
    </form></td>
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
