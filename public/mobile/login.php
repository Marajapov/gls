<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('../config.php');
		$phone = getpost('phone');
		$password = getpost('password');
		
		if (trim($phone)=="" || trim($password)=="") die("-1");
		
		$md5pass =  md5($password);
		
		$sql = "SELECT * FROM gls_user WHERE phone='".$phone."' AND password='".$md5pass."'";
		$result = mysql_query("SELECT * FROM users where phone like '".$phone."' and password like '".$md5pass."'");
		if (mysql_num_rows($result) > 0) {
			$api_key = "AIzaSyCRIMUIank2gBL7LFmQvGfUX5gJCZnleC8";
			$sender_id = "113815402337";
			$row = mysql_fetch_array($result);
			$id = $row["id"];
			die($id);
		}
		die(0);
 }
 ?>