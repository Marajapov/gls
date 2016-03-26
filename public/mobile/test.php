<?php 
	if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once('config.php');
		$phone = getget('phone');
		$password = getget('password');
		
		//if (trim($phone)=="" || trim($password)=="") die("-1");
		//$md5pass =  Hash::make('123123');

		$hash = md5($password);
		$sql = "SELECT * FROM users WHERE phone='".$phone."' AND password2='".$hash."'";
		$result = mysql_query("SELECT * FROM users where phone like '".$phone."' and password2 like '".$hash."'");

		if (mysql_num_rows($result) > 0) {
			$api_key = "AIzaSyCRIMUIank2gBL7LFmQvGfUX5gJCZnleC8";
			$sender_id = "113815402337";
			$row = mysql_fetch_array($result);
			$id = $row["id"];
			die($id);
		}
		die("0");
 }
 die("-2");
 ?>