<?php
include_once("vendor/db.php");
$start_time = "8:00am";
$current_hour = (int)date("g");
$current_minute = (int)date("i");
$current_am_pm = date("a");
if($current_hour >= 8 && $current_minute >= 0 && $current_am_pm == "am"||true){
ob_start();
session_start();

//$host="localhost"; // Host name 
//$username=""; // Mysql username 
//$password=""; // Mysql password 
//$db_name="test"; // Database name 
//$tbl_name="members"; // Table name 

// Connect to server and select databse.
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");
$_db = new db(); 
$connection = $_db->get_connection();

// Define $myusername and $mypassword 
$myusername=$_POST['inputEmail']; 
$mypassword=$_POST['inputPassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$myusername = $connection->real_escape_string($myusername);
$mypassword = $connection->real_escape_string($mypassword);
$mypassword = md5($mypassword);
$count = $_db->get_valid_user($connection,$myusername,$mypassword);
$uid = $_db->get_valid_uid($connection,$myusername,$mypassword);
// If result matched $myusername and $mypassword, table row must be 1 row

//echo $myusername;
 
if($count==1){
	
	echo $_db->check_complete($connection, $uid);
	if($_db->check_complete($connection, $uid)){
		header("location:index.php?error=3");
	}else{
	
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['username'] = $myusername; 
	$_SESSION['password'] = $mypassword; 
	$_SESSION['uid'] = $uid;
	$_SESSION['last_activity'] = time(); 
	header("location:secure/form.php");
	}
}
else {
header("location:index.php?error=1");
}

ob_end_flush();
}
else{
	header("location:index.php?error=4");
}
?>