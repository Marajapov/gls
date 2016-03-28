<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
ini_set('display_errors', '0');
//error_reporting(E_ALL);
//ini_set("display_errors", 1); 

header('Content-type: text/html; charset=UTF-8');


$db_host="localhost";
$db_user="root";
$db_pass="root";
$db_name="glsdb";

define('DB_PREFIX', "");
define('ROOT_PATH', dirname(__FILE__));
date_default_timezone_set('Asia/Bishkek');
require_once "class/classloader.php";
require_once "class/functions.php";
$session = new Session; 

$db=new db_mysql($db_host,$db_user,$db_pass,$db_name);
$db->connect();
mysql_query('SET CHARACTER SET utf8');
date_default_timezone_set('Asia/Bishkek');

?>