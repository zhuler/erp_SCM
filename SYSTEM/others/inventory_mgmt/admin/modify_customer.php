<?php
session_start();
include('../inc_files/inventory.php');
$get = $_SESSION['cust_id'];
$process =  mysql_query("SELECT * FROM customer WHERE `customer_id` = '$get'") or die(mysql_error());
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
           <h1>Modify Customer</h1>
            <?php
           $row = mysql_fetch_array($process) or die(mysql_error());
			$sname = $row['sname'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$address = $row['address'];
			$phone = $row['phone'];
			$sex = $row['sex'];
			$occupation = $row['occupation'];
			$nextok = $row['next_of_kin'];
			$nokaddress = $row['nok_address'];
			$nokphone = $row['nok_phone'];
		  ?>
          <form id="form1" name="form1" method="post" action="update_customer.php">
  <table width="88%" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="23%"><strong>Customer Name</strong></td>
      <td width="77%"><label for="fname"></label>
      <input name="sname" type="text" id="sname" value="<?php echo $sname;?>" size="17" />
      <input name="fname" type="text" id="fname" value="<?php echo $fname; ?>" size="17" />
      <input name="mname" type="text" id="mname" value="<?php echo $mname;?>" size="17" /></td>
    </tr>
    <tr>
      <td><strong>Address</strong></td>
      <td><label for="address"></label>
        <textarea name="address" cols="40" rows="3" id="address"><?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td><strong>Phone</strong></td>
      <td><label for="textfield"></label>
        <input name="phone" type="text" id="textfield" value="<?php echo $phone; ?>"/></td>
    </tr>
    <tr>
      <td><strong>Sex</strong></td>
      <td><input name="sex" type="text" value="<?php echo $sex; ?>" />&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Occupation</strong></td>
      <td>
        <label for="occupation"></label>
        <input type="text" name="occupation" id="occupation" value="<?php echo $occupation; ?>" /></td>
    </tr>
   <tr>
      <td><strong>Next Of Kin</strong></td>
      <td><label for="Nok"></label>
        <input name="nok" type="text" id="Nok" size="40" value="<?php echo $nextok; ?>"/></td>
    </tr>
    <tr>
      <td><strong>Next Of Kin Address</strong></td>
      <td><textarea name="nokaddress" cols="30" rows="3" id="nokaddress2"><?php echo $nokaddress;?></textarea></td>
    </tr>
    <tr>
      <td><strong>Next Of Kin Phone</strong></td>
      <td><input name="nokphone" type="text" id="nokphone" value="<?php echo $nokphone; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Update customer" id="" value="Update customer" />
        <input type="hidden" name="id" id="hiddenField" value="<?php echo $row['customer_id']; ?>" /></td>
    </tr>
  </table>
</form>         </div>
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