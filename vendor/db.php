<?php 
class db{
	
	//private static $mysqli; 
	//private static $connection_config; 
	//private $_username;
	//private $_password; 
	
	// variables
	
	/*private static $_uid;
	private static $_doc_id;
	private static $_vendor_name;
	private static $_booth_name;
	private static $_phone_number;
	private static $_address_1; 
	private static $_address_2;
	private static $_city;
	private static $_province;
	private static $_postal_code;
	private static $_email_address;
	private static $_prev_booth_name;
	 * */
	
	private function connect(){
		// production
		
		$connect_config = array('connection'=>'localhost',
							'user' => 'poweruni_sales',
							'password' => 'uM55WwDq28p9NX8E',
							'database' => 'poweruni_niu_sales'); 
		 
		// local	
		/*		
		$connect_config = array('connection'=>'localhost',
							'user' => 'sales_usr',
							'password' => 'uM55WwDq28p9NX8E',
							'database' => 'niu_sales'); 
		*/
							
		$mysqli = new mysqli($connect_config['connection'], $connect_config['user'], $connect_config['password'], $connect_config['database']);
		if ($mysqli->connect_errno) {
		    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
		return $mysqli; 	
		//$res = $mysqli->query("SELECT 'choices to please everybody.' AS _msg FROM DUAL");
		//$row = $res->fetch_assoc();
		//echo $row['_msg'];				
	}	
	
	public function get_connection(){
		return $this->connect(); 
	}
	
	private function validate_username($db,$username,$password){
		$row_count = 0 ; 
		if(isset($db)){
			$query = "SELECT * FROM account_info WHERE username='$username' and password='$password'"; 
			//echo $query;
			if($stmt = $db->prepare($query)){
				$stmt->execute();
				$stmt->store_result();
				$row_count = $stmt->num_rows; 
				$stmt->close(); 
			}
		}
		return $row_count; 
	}
	
	private function validate_uid($db,$username,$password){
		$_uid = -1 ;
		if(isset($db)){
			$query = "SELECT uid FROM account_info WHERE username='$username' and password='$password'"; 
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			if (isset($row)){
				$_uid = $row['uid']; 
			}
		}
		return $_uid; 
	}
	
	public function get_valid_user($db,$username,$password){
		return $this->validate_username($db,$username,$password);
	}
	
	public function get_valid_uid($db,$username,$password){
		return $this->validate_uid($db, $username, $password);
	}
	
	public function check_complete($db,$uid){
		$query = "SELECT form_complete FROM vendor_info WHERE uid = $uid";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		if (isset($row['form_complete']) && $row['form_complete'] == 1){
			return true;  
		}
		else {
			return false;
		}
		
	}
	
	/*
	public function set_vendor_name($vendor_name){
		$_vendor_name = $vendor_name; 
	}
	public function set_booth_name($booth_name){
		$_booth_name = $booth_name; 
	}
	public function set_phone_number($phone_number){
		$_phone_number = $phone_number; 
	}
	public function set_address_1($address_1){
		$_address_1 = $address_1; 
	}
	public function set_address_2($address_2){
		$_address_2 = $address_2; 
	}
	public function set_city($city){
		$_city = $city; 
	}
	public function set_province($province){
		$_province = $province; 
	}
	public function set_postal_code($postal_code){
		$_postal_code = $postal_code; 
	}
	public function set_email_address($email_address){
		$_email_address = $email_address; 
	}
	public function set_prev_booth_name($prev_booth_name){
		$_prev_booth_name = $prev_booth_name; 
	}
	public function set_uid($uid){
		$_uid = $uid; 
	}
	public function set_doc_id($doc_id){
		$_doc_id = $doc_id; 
	}
	 * 
	 */
	
	public function insert_data($db, $data){
		$query = 'INSERT INTO vendor_info (uid,username,vendor_name,booth_name,phone_number,address_1,address_2,city,province,postal_code,email_address,prev_booth_name) VALUES ('; 
		$run_query = true; 
		if (isset($data['uid']) and $data['uid'] != ''){
			$query = $query.$data['uid'].',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['username']) and $data['username'] != ''){
			$query = $query."'".$data['username']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['vendor_name']) and $data['vendor_name'] != ''){
			$query = $query."'".$data['vendor_name']."'".',';
		}
		else{
			$run_query = false; 
		}
		
		if (isset($data['booth_name']) and $data['booth_name'] != ''){
			$query = $query."'".$data['booth_name']."'".',';
		}
		else{
			$query = $query."NULL,";
		}
		
		if (isset($data['phone_number']) and $data['phone_number'] != ''){
			$query = $query."'".$data['phone_number']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['address_1']) and $data['address_1'] != ''){
			$query = $query."'".$data['address_1']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['address_2']) and $data['address_2'] != ''){
			$query = $query."'".$data['address_2']."'".',';
		}
		else{
			$query = $query."NULL,";
		}
		if (isset($data['city']) and $data['city'] != ''){
			$query = $query."'".$data['city']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['province']) and $data['province'] != ''){
			$query = $query."'".$data['province']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['postal_code']) and $data['postal_code'] != ''){
			$query = $query."'".$data['postal_code']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['email_address']) and $data['email_address'] != ''){
			$query = $query."'".$data['email_address']."'".',';
		}
		else{
			$run_query = false; 
		}
		if (isset($data['prev_booth_name']) and $data['prev_booth_name'] != ''){
			$query = $query."'".$data['prev_booth_name']."'";
		}
		else{
			$query = $query."NULL";
		}
		$query = $query.')';		
		if($run_query){
			//echo $query;
			$result = $db->query($query);
			//echo $result; 
		}
	}
	
}
?>