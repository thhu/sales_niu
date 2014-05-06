<?php
include_once("../vendor/db.php");
session_start();
function validate_booth($connection, $section, $booth_number){
	// validate booths beside eachother
	// validate booths back to back
	$valid = true;
	$uid = $_SESSION['uid']; 
	$query = "SELECT bid,section,booth_number,validation_rules FROM booth_info WHERE uid = $uid";
	//echo $query."<br>";
	$result = $connection->query($query); 
	$row = $result->fetch_assoc();
	//foreach ($row as $key => $value) {
	//	echo "$key: $value<br>";
	//}
	if(isset($row['bid'])){
		$first_section = $row['section']; 	
		//echo "first_section: $first_section<br>";
		//echo "section: $section<br>";	 
		if($first_section == $section){
			$validation_rules = $row['validation_rules'];
			$pattern = "/,/";
			$new_array = preg_split($pattern, $validation_rules);
			$valid = false; 
			//foreach ($new_array as $key => $value) {
			//	echo "$key: $value<br>";
			//}
			//echo "booth_number: $booth_number<br>";
			foreach ($new_array as $key => $value) {
				if($booth_number == $value){
					$valid = true; 
				}
			}	
		}
		else {
			$valid = false;
		}	
	}
	return $valid; 
}

$_db = new db(); 
$connection = $_db->get_connection();
if($_db->check_complete($connection,$_SESSION['uid'])){
	$error = true; 
	header("location:../index.php?error=3");	
	$_SESSION['complete'] = true; 
}
else{
//echo "flag";
$error = false;
$booth_array = $_POST['booth'];
//foreach ($booth_array as $key => $value) {
//	echo "key: $key value: $value <br>";
//} 
$count = count($booth_array);
//echo $count;
if($count >= 1 && $count <= 2){
	$counter = 1; 
	foreach ($booth_array as $key => $value) {
		$booth = $value[0];
		$booth_string_length = strlen($value);
		$section = $booth[0];
		$booth_number = "";
		// sets the booth number
		if($booth_string_length == 2){
			$booth_number = $value[1];
		}
		else if($booth_string_length == 3){
			$booth_number = $value[1].$value[2];
		}
		$value_2 = $value[1];
		//echo "value: $value_2";
		//echo "booth_length: $booth_string_length <br>";
		//echo "booth_number first: $booth_number";
		// validates that the booth number is correct;
		if (!validate_booth($connection,$section,$booth_number)){
			//echo "invalid";
			$error=true;
			$uid = $_SESSION['uid'];
			$query = "UPDATE booth_info SET uid = NULL, taken = 0 WHERE uid = $uid";
			echo $query; 
			$connection->query($query);
			header("location:select_booth.php?error=3");
		}
		else{
			$query = "SELECT taken FROM booth_info WHERE section = '$section' AND booth_number = $booth_number"; 
			//echo $query."<br>";
			$result = $connection->query($query);
			$row = $result->fetch_assoc();
			if(isset($row['taken']) && $row['taken'] == 0){
				$uid = $_SESSION['uid'];
				$query = "UPDATE booth_info SET uid = '$uid',taken = 1 WHERE section = '$section' AND booth_number = $booth_number";
				//echo $query."<br>";
				$connection->query($query);
				$query = "UPDATE vendor_info SET reserve_booth_$counter = '$booth$booth_number' WHERE uid = '$uid'";
				$connection->query($query);
				//echo $query."<br>";
				$counter ++ ; 
			}
			elseif (isset($row['taken']) && $row['taken'] == 1) {
				$uid = $_SESSION['uid']; 
				// check if vendor has not taken any other booths
				$query = "SELECT vid FROM vendor_info WHERE uid = $uid and reserve_booth_1 is NULL";
				$result = $connection->query($query);
				$row = $result->fetch_assoc();
				// if vendor has already taken a booth, clear it 
				if(!isset($row['vid'])){
					$query = "UPDATE vendor_info SET reserve_booth_1 = NULL WHERE uid = $uid";
					$connection->query($query);
					$query = "UPDATE booth_info SET uid = NULL, taken = 0 WHERE uid = $uid";
					$connection->query($query);
				}
				$error = true;
				$taken_booth = $section.$booth_number;
				header("location:select_booth.php?taken=$taken_booth");
			}
			else{
				$error = true;
				echo "sql error, please contact admin";
			}
		} 
	}
}
elseif($count > 2){
	//echo "too many booths";
	$error = true;
	header("location:select_booth.php?error=1");
}
elseif($count <= 0){
	//echo "no booths";
	$error= true;
	header("location:select_booth.php?error=2");
}
if(!$error){
	include_once("header.php");
	$username = $_SESSION['username'];
	$email = $_SESSION['user_email'];
	$message = "This message is to inform you that: $username has reserved: "; 
	foreach ($_POST['booth'] as $key => $value) {
		$message = $message."$value, ";
	} 
	$message = $message." using this email: $email. This is an automatic message, please do not reply";
	$to = "sales@power-unit.org";
	$headers = "";
	$_mail = mail($to,$message,$headers);
	if ($_mail){
		$uid = $_SESSION['uid'];
		echo "<h2>Done!</h2><p>Thank you for filling out our form, we will be in contact shortly</p>";
		$query = "UPDATE vendor_info SET form_complete = 1 WHERE uid = $uid"; // set that the vendor already completed their form 
		//echo $query."<br>";
		$connection->query($query);
		//echo $query;
		//session_unset();
		//session_destroy();
	}
	else{
		echo "<h2>Oh No, something went wrong.</h2><p>Please contact sales@power-unit.org with your login name and reserved booths as soon as possible</p>";
	}
	include_once("footer.php");
}
else{
	include_once("header.php");
		echo "<h2>Oh No, something went wrong.</h2><p>Please contact sales@power-unit.org with your login name and reserved booths as soon as possible</p>";
	include_once("footer.php");
}
}
?>