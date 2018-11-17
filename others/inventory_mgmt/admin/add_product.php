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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
           <h1>Product Registration </h1>
           <form action="process_product.php" method="post" name="form1" id="form1">
  <table width="80%" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td></td>
      <td><?php echo @$_SESSION['msg'];?></td>
    </tr>
    <tr>
      <td width="25%" valign="top"><strong>Product Name</strong></td>
      <td width="75%"><label for="Name"></label>
<datalist id="prod_name">
	<?php while ($rs = mysql_fetch_array($get_prod)){?>
  <option value="<?php echo $rs['product_name'];?>"><?php echo $rs['product_name'];?></option>
  <?php }?>
  <!-- … -->
</datalist>
<span id="sprytextfield1">
<input name="name" type="text" id="name" size="40" list="prod_name" placeholder="Select Product Name" />
</span></td>
    </tr>
    <tr>
      <td valign="top"><strong>Cost Price</strong></td>
      <td><span id="sprytextfield2">
      <label>
      <input type="text" name="costp" id="costp" title="Enter The Cost Price" placeholder="Cost Price"/>
      </label></span></td>
    </tr>
    <tr>
      <td valign="top"><strong>Selling Price</strong></td>
      <td><span id="sprytextfield3">
        <input type="text" name="sellingp" id="sellingp" title="Enter The Selling Price" placeholder="Selling Price" /></span></td>
    </tr>
    <tr>
      <td valign="top"><strong>Supplier</strong></td>
      <td><textarea name="supplier" cols="40" rows="3" id="supplier" title="Enter The Name or Company Name of The Supplier" placeholder="Supplier Name" /></textarea></td>
    </tr>
    <tr>
      <td valign="top"><strong>Quantity</strong></td>
      <td><label for="quantity"></label>
        <span id="sprytextfield4">
        <input type="text" name="quantity" id="quantity"  title="Enter The Quantity To Be Stocked" placeholder="Quantity" /></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Add Product" id="" value="Add Product" title="Click Here To Add Product" style="cursor:pointer" />
        <input type="reset" name="Reset" id="button" value="Reset" title="Click Here To Clear All Input" style="cursor:pointer" /></td>
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
<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
<?php $_SESSION['msg'] = "";?>