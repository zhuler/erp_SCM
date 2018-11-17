<?php
include('../connection/inventory.php');
$veiw=mysql_query("SELECT * FROM customer") or die(mysql_error());

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
          <table width="100%">
  <tr>
    <td width="5%">S/N</td>
    <td>Full Name</td>
    <td width="12%">Address</td>
    <td width="7%">Phone Number</td>
    <td width="5%">Sex</td>
    <td width="7%">Occupation</td>
    <td width="9%">Next Of Kin</td>
     <td width="11%">Address Of Kin</td>
     <td width="12%">Next Of Kin Phone</td>
	<td width="9%">Action</td>
  </tr>
          <?php
		  $sn=1;
		  while($row=mysql_fetch_array($veiw)){
			  
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

		  ?>
  <tr>
    <td><?php echo $sn;?>&nbsp;</td>
    <td><?php echo  $fname. $lname.  $mname;?>&nbsp;</td>
     <td><?php echo $address;?>&nbsp;</td>
    <td><?php echo $phone;?>&nbsp;</td>
    <td><?php echo $sex;?>&nbsp;</td>
    <td><?php echo $occupation;?>&nbsp;</td>
     <td><?php echo $nextok;?>&nbsp;</td>
	  <td><?php echo $nokaddress;?>&nbsp;</td>
      <td><?php echo $nokphone;?>&nbsp;</td>



    <td valign="bottom"><form id="form1" name="form1" method="get" action="modify_customer.php">
      <input type="submit" name="" id="" value="Modify" alt="modify" />
      <input type="hidden" name="modify" id="hiddenField" value="<?php echo $row['customer_id']; ?>" />
    </form>
    <form action="delete_customer.php" method="get"><input name="" type="submit" value="Delete"  alt="delete"/>
      <input type="hidden" name="delete" id="delete" value="<?php echo $row['customer_id']; ?>" />
    </form></td>
  </tr>
   <?php 
		 $sn=$sn+1;
		 } ?>
</table>

                     
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
