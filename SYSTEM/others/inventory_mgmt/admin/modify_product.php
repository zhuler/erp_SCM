<?php
session_start();
include('../inc_files/inventory.php');
$get = $_SESSION['prod_id'];
$process =  mysql_query("SELECT * FROM product WHERE `product_id` = '$get'") or die(mysql_error());
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
           <h1>Modify Product</h1>
           <?php
		  $row = mysql_fetch_array($process) or die(mysql_error());
			  $name=$row['product_name'];
			  $cost=$row['cost_price'];
			  $selling=$row['selling_price'];
			  $supplier=$row['supplier'];
		 $quantity=$row['quantity'];
		 
		  ?>
          <form id="form1" name="form1" method="post" action="update_product.php">
  <table width="80%" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="24%"><strong>Product Name</strong></td>
      <td width="76%"><label for="Name"></label>
      <input name="name" type="text" id="name" value="<?php echo $name; ?>" size="50" /></td>
    </tr>
    <tr>
      <td><strong>Cost Price</strong></td>
      <td><label for="costp"></label>
      <input type="text" name="costp" id="costp" value="<?php echo $cost?>" /></td>
    </tr>
    <tr>
      <td><strong>Selling Price</strong></td>
      <td><label for="sellingp"></label>
      <input type="text" name="sellingp" id="sellingp" value="<?php echo $selling?>" /></td>
    </tr>
    <tr>
      <td><strong>Supplier</strong></td>
      <td><label for="supplier"></label>
      <textarea name="supplier" cols="40" rows="3" id="supplier" placeholder="Supplier Name"/><?php echo $supplier; ?></textarea></td>
    </tr>
    <tr>
      <td><strong>Quantity</strong></td>
      <td><label for="quantity"></label>
      <input type="text" name="quantity" id="quantity" value="<?php echo $quantity?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="modify" id="modify" value="Modify Product" style="cursor:pointer;" />
        <input type="hidden" name="id" id="hiddenField" value="<?php echo $get;?>" /></td>
    </tr>
  </table>
</form>          </div>
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