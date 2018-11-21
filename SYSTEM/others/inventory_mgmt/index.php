<?php 
session_start();
include("inc_files/inventory.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/livesearch.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="scripts/table.js"></script>
<script type="text/javascript" src="scripts/gs_sortable.js"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var TSort_Data = new Array ('TABLE_2', 'i', 's', 's', 'i', 'i', 's', 'i');
tsRegister();
// -->
</script>
<link rel="stylesheet" type="text/css" href="style/table.css" media="all">

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
	<script language="javascript" src="scripts/jquery.timers-1.0.0.js"></script>
    <script language="javascript" src="scripts/jquery-1.2.6.min.js"></script>
    <script language="javascript" src="scripts/jquery-1.4.2.js"></script>
<script>
var stat="";
function Tooooo()
{
		$.ajax({
		  url: "test1.php",
		  cache: false,
		  success: function(data){
			//$(".refresh").html(html);
			//response
			stat=data;
				if(stat=="MOPARI")
				{
					t=setTimeout("Tooooo()",1000);
					stat="";
				}
		  },
		  error:function (xhr, status, err){
		  Tooooo();
			//alert(xhr.responseText);
		  }
		});
}
</script>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body onload="Tooooo();">
<div id="outermost">
  <div id="in-outermost">
    <div id="wrapper">
      <div id="in-wrapper">
        <div id="banner">
          <?php include("inc_files/header_index.php");?>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div id="body-container">
          <div id="container">
           <h1>User Login Page </h1>
            <form id="form1" name="form1" method="post" action="procces_admin.php">
              <table width="52%" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                  <td><?php echo @$_SESSION['msg'];?></td>
                </tr>
                <tr>
                  <td width="29%">User Type:</td>
                  <td width="71%"><label for="select"></label>
                    <span id="spryselect1">
                    <select name="usertype" id="select">
                      <option selected="selected" value="">Select</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Sales Manager">Sales Manager</option>
                    </select>
                  </span></td>
                </tr>
                <tr>
                  <td>Username:</td>
                  <td>
                    <span id="sprytextfield1">
                    <input type="text" name="username" id="username" value="<?php echo @$_SESSION['username'];?>" title="Supply Username" />
                  </span></td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td><label for="password"></label>
                    <span id="sprytextfield2">
                    <input type="password" name="password" id="password" value="<?php echo @$_SESSION['password'];?>" title="Supply Password" />
                  </span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="button" id="button" value="Log In" style="cursor:pointer;" />
                    <label>
                    <input type="reset" name="reset" id="reset" value="Reset" style="cursor:pointer;"/>
                  </label></td>
                </tr>
              </table>
            </form>
          </div>

          </div>
        </div>
                <?php include ("inc_files/copyright.php"); ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
<?php $_SESSION['msg'] = "";?>