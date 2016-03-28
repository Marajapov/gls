<?php

#** get request from GET or POST or give them default value*****************************
  function get_request($name,$defaultvalue = '')
{
    if(isset($_POST[$name])){
        return $_POST[$name];
        }
    else if(isset($_GET[$name])){
        return $_GET[$name];
        }else{
        return $defaultvalue;
        }
}
#** get extension *******************************************************************************
    function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) return "";
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }      
    
# Redirect browser using the header function
function redirect($location, $type="header") {
	global $db;
	$row = $db->select_one('zakaz_position');
	
    if ($type == "header") {
        header("Location: ".$location);
    } else {
        echo "<script type='text/javascript'>document.location.href='".$location."'</script>\n";
    }
}


#**Delete files picture or ??*****************************************************************************************************
function deleteFile($file_path)
    {
    if ($file_path!= "")
        {
        if (file_exists($file_path)) unlink($file_path);
        }
        
    }


function checkSubFiles($table="",$where="",$r1=""){
    global $db;
    $name="";
                    $row = $db->select($table,$where);
                    if($row[0][$r1]>0){
                       $name=1;
                    }else{
                        $name=0;
                    }
                   
      return $name;
}

function countSubFiles($table="",$where="",$r1=""){
     global $db;
     $count=0;
     $count = $db->select_count($table,$where);
      return $count;
}


#** MAKE STAMP*************************************************************************
function MakeStamp($sourceimage){
    $stamp = imagecreatefrompng('../images/stamp.png');
	$ext = strtolower(pathinfo($sourceimage, PATHINFO_EXTENSION));
	if ($ext=="jpg") $im = imagecreatefromjpeg($sourceimage);
		else if ($ext=="png") $im = imagecreatefrompng($sourceimage);
			else if ($ext=="gif") $im = imagecreatefromgif($sourceimage);
				else return;
	
	$sx = (int)(imagesx($im)/2 - imagesx($stamp)/2); 
	$sy = (int)(imagesy($im)/2 - imagesy($stamp)/2);
	
	// Copy the stamp image onto our photo using the margin offsets and the photo 
	// width to calculate positioning of the stamp. 
	imagecopy($im, $stamp, $sx, $sy, 0, 0, imagesx($stamp), imagesy($stamp));
	imagejpeg($im, $sourceimage, 85);
}

#** Redirect browser with custom message*************************************************************************
function GotoURLMsg($url,$seconds,$msg){
     global $lang;
    $strOut=$strOut."<div align='center'><meta http-equiv=\"Refresh\" content='".$seconds."; URL=".$url."'>";
    $strOut=$strOut."<br>";
    $strOut=$strOut.$msg;
    $strOut=$strOut."<br><a href='".$url."'>if not redirect auto  click here</a>";
    $strOut=$strOut."<br></div>";
    return $strOut;
}

#** GET AND POST ***************************
function getget($parameter){
		return sanitize($_GET[$parameter]);
}

function getpost($parameter){
		return sanitize($_POST[$parameter]);
}

#** SANITIZE ***************************
function sanitize($input){
		$input = htmlspecialchars($input);
        $input = addslashes($input); 
        $input = mysql_real_escape_string($input);
		return $input;
}

#** PRICIE $$$$ ***************************

function returnprice($val, $cur, $usdtokgs){
	if (!$val) {return 0;}
	return $val;
	//if($cur == $_SESSION['currency']) return $val;
	//	else if ($cur==1) return $usdtokgs	* $val;
	//		else return ceil($val/$usdtokgs);
}

function returndiscountprice($val, $cur, $usdtokgs, $discount, $discountdatefrom, $discountdate){
	//if (!isset($_SESSION['currency']) || $_SESSION['currency']=="") $_SESSION['currency'] = 1;
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	$start_date = strtotime($discountdatefrom);
	$expiration_date = strtotime($discountdate);

	if (!$val) {return 0;}
	
	if ($start_date <= $today && $expiration_date >= $today) $val = $val - (ceil($val*$discount/100));
	return $val;
	//if($cur == $_SESSION['currency']) return $val;
	//	else if ($cur==1) return $usdtokgs	* $val;
	//		else return ceil($val/$usdtokgs);
}

function showdiscountprice($val, $cur, $usdtokgs, $discount, $discountdatefrom, $discountdate){

	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	
	$start_date = strtotime($discountdatefrom);
	$expiration_date = strtotime($discountdate);

	if (!$val) {echo 0; return;}
	
	if ($start_date <= $today && $expiration_date >= $today) $val = $val - (ceil($val*$discount/100));
	return $val;
	//if($cur == $_SESSION['currency']) echo $val;
	//	else if ($cur==1) echo $usdtokgs	* $val;
	//		else echo ceil($val/$usdtokgs);
}

function showrdate($time) {
		$MonthNames=array("","Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
		$timear1 = explode(" ", $time);
		$timear = explode("-", $timear1[0]);
		return $timear[2]." ".$MonthNames[(int)$timear[1]]." ".$timear[0]." г.";
}

function showimage($img, $width, $height) {
		//list($w, $h, $t, $a) = getimagesize($img);
		//if ()
		echo '<img src="'.$img.'" height="'.$height.'" />';
}

function generateUserNameString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


?>
