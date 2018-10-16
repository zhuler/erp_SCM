<?php
include('../inc_files/inventory.php');
$veiw=mysql_query("SELECT * FROM staff") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/livesearch.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bello Owu Investment</title>
<link rel="stylesheet" href="../style/jquery-ui.css">
<script type="text/javascript" src="../scripts/table.js"></script>
<script type="text/javascript" src="../scripts/gs_sortable.js"></script>
<script type="text/javascript">
<!--
var TSort_Data = new Array ('TABLE_2', 'i', 's', 's', 'i', 'i', 's', 'i');
tsRegister();
// -->
</script>
<link rel="stylesheet" type="text/css" href="../style/table.css" media="all">

<script src="../scripts/jquery-1.10.2.js"></script>
  <script src="../scripts/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
<script type="text/javascript" language="javascript">
function checker(){
	var result = confirm("Do you really want to remove this staff permanently?");
	if(result == false){
		return false;	
	}
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
           <h1>View Staff Details</h1>
           <table width="95%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
             <thead>
               <?php $sn = 1;?>
               <tr>
                 <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
                 <th width="174" class='table-sortable:default table-sortable' title='Click to sort'>NAME</th>
                 <th width="92" class='table-sortable:default table-sortable' title='Click to sort'>Phone Number</th>
                 <th width="98" class='table-sortable:default table-sortable' title='Click to sort'>Category</th>
                 <th width="121" class='table-sortable:default table-sortable' title='Click to sort'>Passport</th>
                 <th width="117" class='table-sortable:default table-sortable' title='Click to sort'>ACTION</th>
               </tr>
             </thead>
             <tbody>
               <?php
		  $sn=1;
		  while($row=mysql_fetch_array($veiw)){
			  
			  $sname=$row['sname'];
			  $fname=$row['fname'];
			  $mname=$row['mname'];
			  $address = $row['address'];
			  $phone = $row['phone'];
			  $sex = $row['sex'];
			  $category = $row['category'];
			  $passport = $row['passport'];
			  $status = $row['status'];
			  $email = $row['email'];
	$pix = '<img src=../passport/'.$passport.' height="120" width="120" hspace="5" vspace="5" border="0"/></a>';
		  ?>
               <tr class=''>
                 <td><?php echo $sn ;?></td>
                 <td><?php echo  $sname."  ".$fname." ". $mname;?></td>
                 <td><?php echo $phone;?></td>
                 <td><?php echo $category;?></td>
                 <td><?php echo $pix;?></td>
                 <td><form id="form1" name="form1" method="get" action="tmp_eradicate.php">
                   <input type="submit" name="submit" id="input" value="Modify" alt="modify" style="cursor:pointer;" title="CLick here to modify the record" />
                   <input type="hidden" name="modify" id="modify" value="<?php echo $row['staff_id']; ?>" />
                   <input type="hidden" name="type" id="type" value="modify_staff" />
                 </form>

<form name='form3' id="form3" action='edit.php' method='POST'>
	<?php
	if (@$status == "Active"){ ?>
		<input name='id' type='hidden' value=<?php echo $row['staff_id'];?>/>
		<input name='status' type='hidden' value='Active'  />
		<input type='Submit' name='Edit' value='Barn User' style='cursor:pointer'>
	<?php } 
	if ($status == "Barned"){ ?>
		<input name='id' type='hidden' value=<?php echo $row['staff_id'];?>/>
		<input name="status" type="hidden" value="Barned"  />
		<input type='Submit' name='Edit' value='Unbarn User' style='cursor:pointer'>
	<?php } ?>
	</form>

                   <form name="form3" id="form3" action="delete_staff.php" method="get" onsubmit="return checker()">
                     <input name="Submit" type="submit" id="Submit" style="cursor:pointer" title="Click Here To Delete Staff Record" value="Delete" />
                     <input type="hidden" name="delete" id="delete" value="<?php echo $row['staff_id']; ?>" />
                 </form>
                 
                 </td>
               </tr>
               <?php $sn++; }?>
             </tbody>
         </table>
           <p>&nbsp;</p>
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
