<?php 
session_start();
include("inventory.php");
$type = $_GET['type'];
if ($type == "Cash"){?>
  <label for="skills"></label>
	<input name="skills" type="text" id="skills" size="30" placeholder="Customer Name" title="Type in the customer name here" required/>
<?php }
elseif ($type == "Credit"){?>
<select name="skills" id="skills">
    <option selected="selected"><-- Select Customer Name --></option>
	<?php $get_prod = mysql_query("SELECT * FROM customer") or die(mysql_error());
    while ($rs = mysql_fetch_array($get_prod)){?>
    <option value="<?php echo $rs['customer_id'];?>"><?php echo $rs['sname']." ".$rs['fname']." ".$rs['mname'];?></option>
    <?php }?>
</select><br />
<a href='reg_cust.php' target="_blank" style="color:#390;">Add New Customer</a>
<?php }?>
<div id="live"></div>