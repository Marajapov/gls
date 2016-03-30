<?php

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
	
	require_once 'config.php';
	
	
	$id = getget('id');
	
	$response = array();
	$response["command"] = 1;
	$response["feed"] = array();
	
	// GET ORDER DETAILS
	$query = 	"SELECT o.*, c.name as cname, s.name as sname 
				FROM orders as o 
				inner join categories as c ON c.id = o.category_id
				inner join subcategories as s ON s.id = o.subcategory_id 
				where o.id = ".$id;
	$sub_id = 0;			
	$result = mysql_query($query);
	$item = mysql_fetch_array($result, MYSQL_ASSOC);
	$product = array();
	$product["id"] = $id;
	$sub_id = $item["subcategory_id"];
	$product["subcategory"] = $item["sname"];
	$product["description"] = substr($item["description"],0, 100);
	$product["price"] = $item["price"];
	$product["dt"] = $item["updated_at"];
	array_push($response["feed"], $product);
	
	$sendMessage = json_encode($response);

	// GET USER LIST
	$gcm_list = array();
	$users_query = "select u.gcm from users u 
					INNER JOIN user_subcategory_ties ust ON u.id = ust.user_id
					WHERE ust.subcategory_id = ". $sub_id." AND u.gcm IS NOT NULL";

	$users_result = mysql_query($users_query);
	while ($item = mysql_fetch_array($users_result, MYSQL_ASSOC)) {
		array_push($gcm_list, $item['gcm']);
	}
	
	// GCM
	
	$headers = array(
            'Authorization: key= AIzaSyA5JH4mkuGEgLUzHJ2hEGelG4kGYKYddSQ',
            'Content-Type: application/json'
        );
	
	$fields = array(
            'registration_ids' => $gcm_list,
            'data' => array("message" => $sendMessage),
        );
		
	$contentGCM = json_encode($fields);
	
	$url = 'https://gcm-http.googleapis.com/gcm/send';
	// Open connection
        $ch = curl_init();
		
		
		
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $contentGCM);
		
		
        // Execute post
        $resultt = curl_exec($ch);
        if ($resultt === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
		
        // Close connection
        curl_close($ch);
		
		
	
} 

?>