<?php 
session_start();
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
           <h1>Staff Registration</h1>
           <form action="process_staff.php" method="post" enctype="multipart/form-data" name="form1" id="form1" >
  <table width="90%" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td></td>
      <td><?php echo @$_SESSION['msg'];?></td>
    </tr>
    <tr>
      <td width="20%"><strong>Name</strong></td>
      <td width="80%"><label for="surname"></label>
        <span id="sprytextfield1">
        <input type="text" name="surname" id="surname" placeholder="Surname" title="Supply your surname"/></span>
        <span id="sprytextfield6"><label><input type="text" name="firstname" id="firstname" placeholder="First Name" title="Supply your first name"/></label></span>
        <label> <input type="text" name="othernames" id="othernames" placeholder="Middle Name" title="Supply your middle name" /></label></td>
    </tr>
    <tr>
      <td valign="top"><strong>Address</strong></td>
      <td><label for="address"></label>
        <span id="sprytextarea1">
        <label>
        <textarea name="address" id="address" cols="50" rows="5" placeholder="Address"></textarea>
        </label></span></td>
    </tr>
    <tr>
      <td><strong>Email</strong></td>
      <td><label><input name="email" type="text" id="email" size="50" placeholder="Email Address" title="Supply Your Email Address here" /></label></td>
    </tr>
     <tr>
      <td><strong>Phone</strong></td>
      <td><span id="sprytextfield3"><label><input type="text" name="phone" id="phone" placeholder="Telephone Number" title="Supply Staff Telephone Number" /></label></span></td>
    </tr>
    <tr>
      <td><strong>Sex</strong></td>
      <td><input type="radio" name="sex" id="radio" value="male" />
        <label for="sex">Male 
          <input type="radio" name="sex" id="radio2" value="female" />
        Female</label></td>
    </tr>
    <tr>
      <td><strong>Category</strong></td>
      <td>
        <label for="category">
        <span id="spryselect1">
          <select name="category" id="select">
            <option selected="selected" value="">Select</option>
            <option value="Administrator">Administrator</option>
            <option value="Sales Manager">Sales Manager</option>
        </select>
        </span>
        </label>
       </td>
    </tr>
    <tr>
      <td><strong>Passport</strong></td>
      <td><label for="fileField"></label>
        <input type="file" name="passport" id="passport" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Add Staff" title="Click Here To Add Staff" style="cursor:pointer" />
        <input type="reset" name="reset" id="reset" value="Reset" title="Click Here To Cleat All Input" style="cursor:pointer" /></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
//-->
</script>
</body>
</html>
<?php $_SESSION['msg'] = "";?>