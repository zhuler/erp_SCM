<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'inventory';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM customer WHERE sname LIKE '%".$searchTerm."%' OR fname LIKE '%".$searchTerm."%' OR mname LIKE '%".$searchTerm."%' ORDER BY customer_id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['sname']." ".$row['fname']." ".$row['mname'];
}
//return json data
echo json_encode($data);
?>