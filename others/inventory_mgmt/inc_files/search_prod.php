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
      <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='84'>Add to Sales</th>
      <th class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' width='60'>S/NO</th>
      <th width="303" class='table-sortable:default table-sortable' title='Click to sort'>PRODUCT NAME</th>
      <th width="153" class='table-sortable:default table-sortable' title='Click to sort'>COST PRICE</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>SELLING PRICE</th>
      <th width="127" class='table-sortable:default table-sortable' title='Click to sort'>QUANTITY IN STOCK</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row= mysql_fetch_array($getrec)){
	$id = $row['product_id'];
	$name  = $row['product_name'];
	$cprice = $row['cost_price'];
	$sprice  = $row['selling_price'];
	$quantity  = $row['quantity'];
?>
    <tr class=''>
      <td><?php 	
	// check if this product has been placed on order for current placement
	$check = mysql_query("SELECT * FROM tmp_order WHERE staff_id = '$staff_id' AND prod_id ='$id'") or die(mysql_error());
?>
      <input name='<?php echo $id;?>' type='checkbox' value='<?php echo $id;?>' onclick='return pick2(this.value)' id='<?php echo $id; ?>' <?php if(mysql_num_rows($check)){?>checked='checked'<?php }?> /></td>
      <td><?php echo $sn;?></td>
      <td><?php echo $name;?></td>
      <td><?php echo $cprice;?></td>
      <td><?php echo $sprice;?></td>
      <td><?php echo $quantity;?></td>
    </tr>
    <?php $sn++; }?>
  </tbody>
</table>
<?php }
else {?>
<p> No Record Match Your Search Criteria</p>
<?php }
?>