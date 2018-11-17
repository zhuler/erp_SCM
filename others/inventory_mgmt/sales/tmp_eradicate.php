<?php
session_start();
if ($_GET['type'] == "report"){
	$_SESSION['r_id'] = $_GET['id']; 
	header("Location:view_details.php");
}


?>