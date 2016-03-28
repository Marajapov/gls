<?php
$response = array();
$response["success"] = 1;
$response["feed"] = array();
if (1) {
    $id = 0;
	require_once 'config.php';
	$result = mysql_query("SELECT * FROM categories");
	while ($item = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$product = array();
		$product["db_id"] = $item["id"];
		$product["category"] = $item["cname"];
		$product["resource"] = $item["nm_kg"];
		$product["name"] = $item["nm"];
		$product["description"] = $item["txt"];
		$product["price"] = $item["lat"];
		$product["count_left"] = 0;
		$product["count"] = $item["father"];
		$product["dt"] = time();
		array_push($response["feed"], $product);
	}
	
} 
echo json_encode($response);

?>