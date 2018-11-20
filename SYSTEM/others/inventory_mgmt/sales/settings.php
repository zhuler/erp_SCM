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
var pass = document.getElementById("new").value;
	if (str != pass){
		document.getElementById("compare").innerHTML ="Password Mismatch";	
	}
	else{
		document.getElementById("compare").innerHTML ="";	
	}
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
           <h1>            <h1>Account Settings</h1>
            <form action="../admin/settings_pro.php" method="post" name="form1" id="form1">
              <table width="570" border="1" align="center" bordercolor="#aaaaaa" cellpadding="5" cellspacing="0" style="border-collapse:collapse">
                <tr>
                  <td colspan="3" align="center" bgcolor="#390"><?php echo @$_SESSION['msg']; ?></td>
                </tr>
                <tr>
                  <td width="146"><b>Current Password</b></td>
                  <td width="167"><span id="sprytextfield1">
                    <input type="password" name="current" placeholder="Current Password" id="current"  onkeyup="return confirmation2(this.value);"/></span></td>
                  <td width="219"><div id="confirm"> </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFCC"><b>New Password</b></td>
                  <td colspan="2" bgcolor="#FFFFCC"><span id="sprytextfield2">
                    <input type="password" name="new" id="new" placeholder="New Password" />
                  </span></td>
                </tr>
                <tr>
                  <td><b>Re-Type Password</b></td>
                  <td><span id="sprytextfield3">
                    <input name="checker" type="password" id="checker" placeholder="Confirm Password" onkeyup="return compared(this.value);"  />
                  </span></td>
                  <td style="color:#F00"><div id="compare"> </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFCC">&nbsp;</td>
                  <td colspan="2" bgcolor="#FFFFCC"><input type="submit" name="submit" id="submit" value="Submit" style="cursor:pointer" title="Click here to modify login details" />
                  <input type="reset" name="Reset" id="Reset" value="Reset" style="cursor:pointer" title="Resets all entries"/></td>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
<?php $_SESSION['msg'] = "";?>