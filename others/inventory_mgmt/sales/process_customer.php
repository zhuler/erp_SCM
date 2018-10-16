<?php
include('../connection/inventory.php');
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
          <p><?php
		  $fname=$_POST['firstname'];
		  $lname=$_POST['lastname'];
		  $mname=$_POST['middlename'];
		  $address=$_POST['address'];
		  $phone=$_POST['phone'];
		  $sex=$_POST['sex'];
		 $occupation=$_POST['occupation'];
		 $next=$_POST['nok'];
	   $nextaddress=$_POST['nokaddress'];
		 $nextphone=$_POST['nokphone'];
		  $save=mysql_query("INSERT INTO customer  (`first_name`, `last_name`, `middle_name`, `address`, `phone`, `sex`,`occupation`, `next_of_kin`, `nok_address`, `nok_phone`) VALUES ('$fname', '$lname', '$mname', '$address',  '$phone', '$sex', '$occupation','$next', '$nextaddress', '$nextphone')") or die(mysql_error());
		  header('location:add_customer.php')
		  ?>
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
  </div></body>
</html>
