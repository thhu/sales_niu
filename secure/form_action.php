<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:../index.php");
}
elseif(time()-$_SESSION['last_activity'] > 1800){
		session_unset();
		session_destroy();
		header("location../index.php?error=2");
}
	
include_once('../vendor/db.php');

function validate_data($connection,$data){
	$return_string = stripslashes($data);
	return $connection->real_escape_string($return_string);
}
$_db = new db();
$connection = $_db->get_connection();  


$uid = $_SESSION['uid'];
$uid = stripslashes($uid); 
$uid = $connection->real_escape_string($uid);

// validate that the user has not already entered in a value
$query = "SELECT vid FROM vendor_info WHERE uid = $uid";
$result = $connection->query($query); 
$row = $result->fetch_assoc();
if(isset($row['vid'])){
	header("location:select_booth.php?error=4");
}
else{
$_data = array(
	'uid' => $_SESSION['uid'],
	'username' => $_SESSION['username'],
	'vendor_name' => validate_data($connection, $_POST['vendor_name']),
	'booth_name' => validate_data($connection, $_POST['booth_name']),
	'phone_number' => validate_data($connection, $_POST['phone_number']),
	'address_1' => validate_data($connection, $_POST['address_1']),
	'address_2' => validate_data($connection, $_POST['address_2']),
	'city' => validate_data($connection, $_POST['city']),
	'province' => validate_data($connection, $_POST['province']),
	'postal_code' => validate_data($connection, $_POST['postal_code']),
	'email_address' => validate_data($connection, $_POST['email_address']),
	'prev_booth_name' => validate_data($connection, $_POST['prev_booth_name'])
);
$_db->insert_data($connection, $_data);
$_SESSION['user_email'] = validate_data($connection, $_POST['email_address']);
header("location:select_booth.php");
}
?>