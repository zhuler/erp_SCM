<?php 
include("../inc_files/inventory.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/livesearch.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
        <div id="body-container">
          <div id="container">
<form id="form1" name="form1" method="post" action="">
  <table width="74%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="23%">&nbsp;</td>
      <td width="77%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Product</strong></td>
      <td><label>
        <select name="product" id="product" onchange="return gatprice(this.value);">
        <?php $get_prod = mysql_query("SELECT * FROM product") or die(mysql_error());
		while ($rs = mysql_fetch_array($get_prod)){?>
        <option selected="selected"><-- Select Product --></option>
        <option value="<?php echo $rs['product_id'];?>"><?php echo $rs['product_name'];?></option>
        <?php }?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><strong>Price</strong></td>
      <td><div id="price"><input type="text" name="dprice" id="dprice" /></div></td>
    </tr>
    <tr>
      <td><strong>Quantity</strong></td>
   <td><input name="quantity" type="text" id="quantity" size="10" placeholder="Quantity Purchased" onkeyup="return compared(this.value);" /></td>
    </tr>
    <tr>
      <td><strong>Mode of Payment</strong></td>
      <td><label>
        <select name="mode" id="mode" onchange="return gatpaytype(this.value);">
          <option selected="selected"><-- Select Mode --></option>
          <option value="Cash">Cash</option>
          <option value="Credit">Credit</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><strong>Customer Name</strong></td>
      <td>
        <div class="ui-widget" id="ui-widget">
            <label for="skills"></label>
            <input type="text" name="skills" id="skills" placeholder="Customer Name"/>
        </div>      </td>
    </tr>
    <tr>
      <td><strong>Total Sales</strong></td>
      <td>
        <input type="text" name="total" id="total" />
      </td>
    </tr>
    <tr>
      <td><strong>Discount</strong></td>
      <td><label>
        <input type="text" name="textfield" id="textfield" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" id="button" value="Make Purchase" style="cursor:pointer" title="Add To Daily Purchase List" />
        <input type="reset" name="Reset" id="Reset" value="Reset" style="cursor:pointer" title="Clears All Entries"/>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
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
