<?php 
session_start();
include("search_head.php");
include("inventory.php");
$value = $_GET['q'];
$staff_id = $_SESSION['id'];

$getrec = mysql_query ("SELECT * FROM product WHERE product_id LIKE '%$value%' OR product_name LIKE '%$value%' ORDER BY product_id ASC") or die(mysql_error());
if (mysql_num_rows($getrec)){?>
<table width="95%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
  <thead>
    <?php $sn = 1;?>
    <tr>
      <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
      <th width="303" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
      <th width="153" class='table-sortable:default table-sortable' title='Click to sort'>SELLING PRICE</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>COST PRICE</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>SUPPLIER</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
		  $sn=1;
		  while($row=mysql_fetch_array($getrec)){
			  $name=$row['product_name'];
			  $cost=$row['cost_price'];
			  $selling=$row['selling_price'];
			  $supplier=$row['supplier'];
			  $quantity=$row['quantity'];
		 
		 ?>
    <tr class=''>
      <td><?php echo $sn ;?></td>
      <td><?php echo $name ;?></td>
      <td><?php echo $selling;?></td>
      <td><?php echo $cost ;?></td>
      <td><?php echo $supplier;?>&nbsp;</td>
      <td><?php echo $quantity ?>&nbsp;</td>
      <td valign="bottom"><form id="form1" name="form1" method="get" action="modify_product.php">
        <input type="submit" name="modify" id="modify" value="Modify" title="Modify Selected User Details" style="cursor:pointer"/>
        <input type="hidden" name="modify" id="modify" value="<?php echo $row['product_id']; ?>" />
      </form>
          <form name="form3" id="form3" action="delete_product.php" method="get" onsubmit="return check();">
            <input name="submit" type="submit" id="submit" value="Delete"  title="Deletes Selected Product" style="cursor:pointer" />
            <input type="hidden" name="delete" id="delete"  value="<?php echo $row['product_id']; ?>"/>
        </form></td>
    </tr>
    <?php $sn++; }?>
  </tbody>
</table>
<?php }
else {?>
<p> No Record Match Your Search Criteria</p>
<?php }
?>