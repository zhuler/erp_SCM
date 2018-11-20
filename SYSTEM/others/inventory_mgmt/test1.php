<?php 
include("inc_files/inventory.php");

function is_connected(){
	$connected = @fopen("http://www.google.com:80/","r");
	if($connected){
		return true;
	}
	else{
		return false;
	}
} 

// update sales_rec records
if(is_connected()){
	// update barn records
	$get_barn = mysql_query("SELECT * FROM barn_record WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_barn)){
		$id = $rec['ID_Num'];
		$sid = $rec['staff_Id'];
		$reason = $rec['reason'];
		$date = $rec['sDate'];
		$time = $rec['sTIme'];
		$type = "barn";
		$barn_synch = file_get_contents("http://www.google.com/inventory/barn.php?type=$type&id=$id&sid=$sid&reason=". UrlEncode($reason)."&dt=$date&ti=$time");
		// to show the synchronization was successful
		$update5 = mysql_query("UPDATE barn_record SET status = '1' WHERE ID_Num = $id") or die(mysql_error());
	}

	// update customer table
	$get_customer = mysql_query("SELECT * FROM customer WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_customer)){
		$cid = $rec['customer_id'];
		$sname = $rec['sname'];
		$fname = $rec['fname'];
		$mname = $rec['mname'];
		$add = $rec['address'];
		$ph = $rec['phone'];
		$occup = $rec['occupation'];
		$sex = $rec['sex'];
		$nok = $rec['next_of_kin'];
		$nok_add = $rec['nok_address'];
		$nok_ph = $rec['nok_phone'];
		$reg = $rec['reg_by'];
		$date = $rec['date'];
		$time = $rec['time'];
		$type = "customer";
		$cust_synch = file_get_contents("http://www.google.com/inventory/customer.php?type=$type&cid=$cid&sname=". UrlEncode($sname)."&fname=". UrlEncode($fname)."&mname=". UrlEncode($mname)."&add=". UrlEncode($add)."&ph=$ph&occup=". UrlEncode($occup)."&sex=$sex&nok=". UrlEncode($nok). "&nok_add=". UrlEncode($nok_add)."&nok_ph=". UrlEncode($nok_ph)."&reg=$reg&dt=$date&ti=$time");
		// to show the synchronization was successful
			$update3 = mysql_query("UPDATE customer SET status = '1' WHERE customer_id = $cid") or die(mysql_error());
	}
	
	// update product 
	$get_product = mysql_query("SELECT * FROM product WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_product)){
		$pid = $rec['product_id'];
		$pname = $rec['product_name'];
		$cp = $rec['cost_price'];
		$sp = $rec['selling_price'];
		$sup = $rec['supplier'];
		$qty = $rec['quantity'];
		$date = $rec['date'];
		$time = $rec['time'];
		$type = "product";
		$prod_synch = file_get_contents("http://www.google.com/inventory/product.php?type=$type&pid=$pid&pname=". UrlEncode($pname)."&cp=$cp&sp=$sp&sup=". UrlEncode($sup). "&qty=$qty&dt=$date&ti=$time");
		// to show the synchronization was successful
		$update6 = mysql_query("UPDATE product SET status = '1' WHERE product_id = $pid") or die(mysql_error());
	}

	// update product sales
	$get_product_sales = mysql_query("SELECT * FROM product_sales WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_product_sales)){
		$pid = $rec['product_id'];
		$pname = $rec['product_name'];
		$cp = $rec['cost_price'];
		$sp = $rec['selling_price'];
		$sup = $rec['supplier'];
		$qty = $rec['quantity'];
		$date = $rec['date'];
		$time = $rec['time'];
		$type = "prod_sales";
		$prod_synch = file_get_contents("http://www.google.com/inventory/product_sales.php?type=$type&pid=$pid&pname=". UrlEncode($pname)."&cp=$cp&sp=$sp&sup=". UrlEncode($sup). "&qty=$qty&dt=$date&ti=$time");
		// to show the synchronization was successful
		$update2 = mysql_query("UPDATE product_sales SET status = '1' WHERE product_id = $pid") or die(mysql_error());
	}
	
	// update sales records
	$get_sales = mysql_query("SELECT * FROM sales WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_sales)){
		$id = $rec['id'];
		$pid = $rec['product_id'];
		$s_id = $rec['staff_id'];
		$qty = $rec['quantity'];
		$receipt = $rec['receipt'];
		$kind = $rec['type'];
		$type = "sales";
		$sales_synch = file_get_contents("http://www.google.com/inventory/sales.php?type=$type&r=$receipt&pid=$pid&sid=$s_id&qty=$qty&id=$id&kind=". UrlEncode($kind));
		// to show the synchronization was successful
		$update1 = mysql_query("UPDATE sales SET status = '1' WHERE id = $id") or die(mysql_error());
	}

	$get_sales_rec = mysql_query("SELECT * FROM sales_rec WHERE status = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_sales_rec)){
		$id = $rec['id'];
		$receipt = $rec['receipt'];
		$customer = $rec['customer'];
		$total = $rec['total'];
		$amount = $rec['amount'];
		$balance = $rec['balance'];
		$discount = $rec['discount'];
		$date = $rec['date'];
		$time = $rec['time'];
		$type = "sales_rec";
		$sales_rec_synch = file_get_contents("http://www.google.com/inventory/sales_rec.php?type=$type&r=$receipt&c=" . UrlEncode($customer) . "&t=$total&a=$amount&b=$balance&d=$discount&dt=$date&ti=$time&id=$id");
		// to show the synchronization was successful
		$update = mysql_query("UPDATE sales_rec SET status = '1' WHERE id = $id") or die(mysql_error());
	}
			
	// update staff
	$get_staff = mysql_query("SELECT * FROM staff WHERE st = '0'") or die(mysql_error());
	while($rec = mysql_fetch_array($get_staff)){
		$sid = $rec['staff_id'];
		$sname = $rec['sname'];
		$fname = $rec['fname'];
		$mname = $rec['mname'];
		$cat = $rec['category'];
		$add = $rec['address'];
		$ph = $rec['phone'];
		$em = $rec['email'];
		$passp = $rec['passport'];
		$stat = $rec['status'];
		$sex = $rec['sex'];
		$uname = $rec['username'];
		$pass = $rec['password'];
		$type = "staff";
		$staff_synch = file_get_contents("http://www.google.com/inventory/staff.php?type=$type&sid=$sid&sname=". UrlEncode($sname)."&fname=". UrlEncode($fname)."&mname=". UrlEncode($mname)."&cat=". UrlEncode($cat)."&ph=$ph&add=". UrlEncode($add)."&em=$em&passp=". UrlEncode($passp). "&stat=". UrlEncode($stat)."&uname=". UrlEncode($uname)."&sex=$sex&pass=$pass");
		// to show the synchronization was successful
		$update4 = mysql_query("UPDATE staff SET st = '1' WHERE staff_id = $sid") or die(mysql_error());
	}
	echo "MOPARI";
}
?>