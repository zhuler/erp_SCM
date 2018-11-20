<?php 
include("inventory.php");
$start = $_GET['p'];
$to = $_GET['q'];
$getrec = mysql_query ("SELECT * FROM sales_rec WHERE `date` >= '$start' AND `date` <= '$to' ORDER BY id DESC") or die(mysql_error());?>
<table width="100%" align="center" cellpadding="5" cellspacing="0" class="example table-autosort:0 table-stripeclass:alternate" id="TABLE_2">
  <thead>
    <?php $sn = 1;?>
    <tr>
      <th width="9%" class='table-sortable:numeric table-sortable table-sorted-asc' title='Click to sort' style="color:#FFF">S/NO</th>
      <th width="29%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">NAME</th>
      <th width="9%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">TYPE</th>
      <th width="9%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">TOTAL</th>
      <th width="6%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">AMOUNT </th>
      <th width="6%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">DISCOUNT </th>
      <th width="12%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">BALANCE
        </td>
      </th>
      <th width="9%" class='table-sortable:default table-sortable' title='Click to sort' style="color:#FFF">DATE
        </td>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$nbal = 0;
	$ntotal = 0;
	$namount = 0;
	$ndiscount = 0;
	while($row= mysql_fetch_array($getrec)){
	$ID = $row['id'];
	$receipt  = $row['receipt'];
	$customer  = $row['customer'];
	$total = $row['total'];
	$amount = $row['amount'];
	$balance = $row['balance'];
	$discount = $row['discount'];
	$date = $row['date'];
	$time = $row['time'];?>
    <tr class=''>
      <td><?php echo $sn;?></td>
      <td><a href="tmp_eradicate.php?id=<?php echo $receipt;?>&type=report" style="color:#390;" title="Click here to view sales product breakdown">
        <?php
	if (is_numeric($customer)){
		$get_cust = mysql_query("SELECT * FROM customer WHERE customer_id = '$customer'") or die(mysql_error());
		$cs = mysql_fetch_array($get_cust);
		$csname = $cs['sname'];
		$cfname = $cs['fname'];
		$cmname = $cs['mname'];
		$cname = $csname." ".$cfname." ".$cmname;
		echo $cname;
	}
	else{
		echo $customer;
	}?>
      </a></td>
      <?php $get_type = mysql_query("SELECT type FROM sales WHERE receipt = '$receipt'")or die();
	$rst = mysql_fetch_array($get_type);
	$type = $rst['type'];
	?>
      <td><?php echo $type;?></td>
      <td align="right"><?php echo number_format($total);
	$ntotal = $ntotal + $total;?></td>
      <td align="right"><?php echo number_format($amount);
	$namount = $namount + $amount;?></td>
      <td align="right"><?php echo number_format($discount);
	$ndiscount = $ndiscount + $discount;?></td>
      <td align="right"><?php if ($balance < 0) {
		echo number_format(substr($balance,1));
		$nbal = $nbal + $balance;
	}?></td>
      <td><?php echo $date;?></td>
    </tr>
    <?php $sn++;	
}?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td style="color:#390;" align="right"><b>#<?php echo number_format($ntotal);?></b></td>
      <td align="right" style="color:#390;"><b>#<?php echo number_format($namount);?></b></td>
      <td align="right" style="color:#390;"><b>#<?php echo number_format($ndiscount);?></b></td>
      <td style="color:#390;" align="right"><b>#<?php echo number_format(substr($nbal,1));?></b></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
