<?php 
session_start();
include("../inc_files/inventory.php");
$mod = $_SESSION['s_id'];
$mod_rec = mysql_query("SELECT * FROM staff WHERE staff_id = '$mod'") or die(mysql_error());
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
           <h1>Modify Staff Record</h1>
            <?php
           $row = mysql_fetch_array($mod_rec) or die(mysql_error());
			  $sname=$row['sname'];
			  $fname=$row['fname'];
			  $mname=$row['mname'];
			  $address=$row['address'];
			  $email=$row['email'];
			  $phone=$row['phone'];
			 $sex=$row['sex'];
			 $category=$row['category'];
		 
		  ?><form id="form1" name="form1" method="post" action="update_staff.php" enctype="multipart/form-data">
  <table width="87%" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="20%"><strong>Name</strong></td>
      <td width="80%"><label for="sname"></label>
        <span id="sprytextfield2">
        <input type="text" name="sname" id="sname" value="<?php echo $sname;?>" />
        </span><span id="sprytextfield4">
        <input type="text" name="fname" id="fname" value="<?php echo $fname;?>" />
        </span>
        <input type="text" name="mname" id="mname" value="<?php echo $mname;?>" /></td>
    </tr>
    <tr>
      <td><strong>Address:</strong></td>
      <td><span id="sprytextarea2">
        <textarea name="address" cols="50" rows="3" id="address"><?php echo $address;?></textarea>
        <span class="textareaRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td><strong>Email:</strong></td>
      <td><label for="textfield"></label>
        <input name="email" type="text" id="textfield" size="40" value="<?php echo $email;?>" /></td>
    </tr>
     <tr>
      <td><strong>Phone:</strong></td>
      <td><label for="textfield"></label>
        <span id="sprytextfield5">
        <input name="phone" type="text" id="textfield2" value="<?php echo $phone;?>" />
        </span></td>
    </tr>
    <tr>
      <td><strong>Sex:</strong></td>
      <td><span id="spryselect3">
        <label>
        <select name="sex" id="sex">
          <option>&lt;-- Select Gender --&gt;</option>
          <option value="<?php echo @$sex;?>" selected="selected"><?php echo @$sex;?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        </label>
        </span></td>
    </tr>
    <tr>
      <td><strong>Category:</strong></td>
      <td><label for="category"></label>
        <span id="spryselect2">
        <select name="category" id="select">
          <option selected="selected" value=""><-- Select Category --></option>
          <option value="<?php echo @$category;?>" selected="selected"><?php echo @$category;?></option>
          <option value="Administrator">Administrator</option>
          <option value="Sales Manager">Sales Manager</option>
        </select>
        </span></td>
    </tr>
    <tr>
      <td><strong>Passport</strong></td>
      <td><label for="fileField"></label>
          <input type="file" name="passport" id="passport" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="update_product" id="Add Product" value="Update Staff" style="cursor:pointer" />
        <input type="hidden" name="id" id="hiddenField" value="<?php echo $row['staff_id']; ?>" /></td>
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
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
//-->
</script>
</body>
</html>
<?php $_SESSION['msg'] = "";?>