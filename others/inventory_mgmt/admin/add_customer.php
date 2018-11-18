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
           <h1>Customer Registration </h1>
           <form action="process_customer.php" method="post" name="form1" id="form1" >
             <table width="89%" align="center" cellpadding="5" cellspacing="0">
               <tr>
                 <td></td>
                 <td><?php echo @$_SESSION['msg'];?></td>
               </tr>
               <tr>
                 <td width="22%"><strong> Name</strong></td>
                 <td width="78%"><input type="text" name="sname" id="sname" title="Enter your First Name" placeholder="Surname" required/>
                 <input type="text" name="fname" id="fname" title="Enter your Last Name" placeholder="Firstname" required/>
                 <input type="text" name="mname" id="mname" title="Enter your Middle Name"   placeholder="Middle Name" /></td>
               </tr>
               <tr>
                 <td><strong>Address</strong></td>
                 <td><textarea name="address" cols="50" rows="3" id="address" title="Enter your Address" placeholder="Address"></textarea></td>
               </tr>
               <tr>
                 <td><strong>Phone</strong></td>
                 <td><input name="phone" type="text" id="phone" title="Enter your Phone Number" placeholder="Phone Number" required/></td>
               </tr>
               <tr>
                 <td><strong>Sex</strong></td>
                 <td><input type="radio" name="sex" id="radio" value="male" />
                   <label for="sex">Male
                     <input type="radio" name="sex" id="radio2" value="female" />
                     Female</label></td>
               </tr>
               <tr>
                 <td><strong>Occupation</strong></td>
                 <td><input type="text" name="occupation" id="occupation" title="Enter your Occupation" placeholder="Occupation"/></td>
               </tr>
               <tr>
                 <td><strong>Next Of Kin</strong></td>
                 <td><input name="nok" type="text" id="Nok" size="40"  title="Enter your Next of kin Name" placeholder="Next Of Kin Name"/></td>
               </tr>
               <tr>
                 <td><strong>Next Of Kin Address</strong></td>
                 <td><textarea name="nokaddress" cols="50" rows="3" id="nokaddress2" title="Enter your Next of kin Address" placeholder="Address Of Next Of Kin"></textarea></td>
               </tr>
               <tr>
                 <td><strong>Next Of Kin Phone</strong></td>
                 <td><input name="nokphone" type="text" id="nokphone" title="Enter your Next of kin Phone Number" placeholder="Next Of Kin's Phone Number" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td><input type="submit" name="submit" id="submit" value="Add Customer" title="Click Here To Add Customer" style="cursor:pointer"/>
                   <label>
                   <input type="reset" name="Reset" id="button" value="Reset" style="cursor:pointer" />
                  </label></td>
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
<?php $_SESSION['msg'] = "";?>