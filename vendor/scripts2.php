<?php 
include_once("db.php");

$section = array(
	'A' => 10,
	'B' => 10,
	'C' => 9,
	'D' => 8,
	'E' => 10,
	'F' => 14,
	'G' => 8,
	'H' => 14,
	'I' => 12,
	'J' => 9,
);
$_db = new db(); 
$connection = $_db->get_connection(); 
foreach ($section as $key => $value) {
	for($i = 1 ; $i <= $value ; $i++){
		$query = "INSERT INTO booth_info (section,booth_number) VALUES ('$key',$i)"; 
		echo $query;
		$connection->query($query);
	}
} 

?>