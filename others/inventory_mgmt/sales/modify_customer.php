<?php
include('../connection/inventory.php');
$get = $_GET['modify'];
$process =  mysql_query("SELECT * FROM customer WHERE `customer_id` = '$get'") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/ico" href="../templates/images/logo.jpg" />
<link href="../templates/style/style.css" rel="stylesheet" type="text/css" />
<link href="../templates/style/sign.css" rel="stylesheet" type="text/css" />
<script src="../templates/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<title>Inventory</title>
</head>

<body>
<div id="main_container">
  <div id="container">
    <div id="header">      
	<?php include("../templates/header.php");?>
    </div>
        <?php include("../admin/menu.php");?>
    <div id="spacer">&nbsp;</div>
    <div id="main_body">
      <div id="main_content">
        <div id="content">
          <p>
          <?php
           $row = mysql_fetch_array($process) or die(mysql_error());
			   $fname=$row['first_name'];
			  $mname=$row['middle_name'];
			  $lname=$row['last_name'];
			  $address=$row['address'];
			  $phone=$row['phone'];
			  $sex=$row['sex'];
		 $occupation=$row['occupation'];
			  $nextok=$row['next_of_kin'];
		 $nokaddress=$row['nok_address'];
		$nokphone=$row['nok_phone'];
		 
		  ?><form id="form1" name="form1" method="post" action="update_customer.php">
  <table width="80%" align="center">
    <tr align="center" bgcolor="#FFFF99">
      <td colspan="2"><h3>CUSTOMER REGISTRATION</h3></td>
    </tr>
    <tr>
      <td width="20%">First Name:</td>
      <td width="80%"><label for="firstname"></label>
      <input name="firstname" type="text" id="firstname" value="<?php echo $fname;?>" /></td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td><label for="lastname"></label>
      <input type="text" name="lastname" id="lastname" value="<?php echo $lname; ?>" /></td>
    </tr>
    <tr>
      <td>Middle Name:</td>
      <td><label for="middlename"></label>
      <input type="text" name="middlename" id="middlename" value="<?php echo $mname;?>" /></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><label for="address"></label>
        <textarea name="address" cols="30" rows="3" id="address"><?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><label for="textfield"></label>
        <input name="phone" type="text" id="textfield" value="<?php echo $phone; ?>"/></td>
    </tr>
    <tr>
      <td>Sex:</td>
      <td><input name="sex" type="text" value="<?php echo $sex; ?>" />&nbsp;</td>
    </tr>
    <tr>
      <td>Occupation:</td>
      <td>
        <label for="occupation"></label>
        <input type="text" name="occupation" id="occupation" value="<?php echo $occupation; ?>" />
</td>
    </tr>
   <tr>
      <td>Next Of Kin:</td>
      <td><label for="Nok"></label>
        <input name="nok" type="text" id="Nok" size="40" value="<?php echo $nextok; ?>"/></td>
    </tr>
    <tr>
      <td>Next Of Kin Address:</td>
      <td><textarea name="nokaddress" cols="30" rows="3" id="nokaddress2"><?php echo $nokaddress;?></textarea></td>
    </tr>
    <tr>
      <td>Next Of Kin Phone:</td>
      <td><input name="nokphone" type="text" id="nokphone" value="<?php echo $nokphone; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Update customer" id="" value="Update customer" />
        <input type="hidden" name="id" id="hiddenField" value="<?php echo $row['customer_id']; ?>" /></td>
    </tr>
  </table>
</form>
                      
          <p>&nbsp;</p>
        </div>
      </div>
    </div>
    <div id="footer">
      <div id="one">Copyright &copy; 2015 <?php if (date("Y") != "2015"){
		  echo " - ".date("Y");
	  }
?></div>
      <div id="two"></div>
    </div>
    </div>
  </div>
</body>
</html>
