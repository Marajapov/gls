<?php

//echo $_POST['g-recaptcha-response'];

$data = array(
    'secret' => '6LcBGBUTAAAAAIMMSwe-ebmOhgMO3c-vmXn_Yyfb',
    'response' => $_POST['g-recaptcha-response']
);
# Create a connection
$url = 'https://www.google.com/recaptcha/api/siteverify';
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$response = curl_exec($ch);
curl_close($ch);

print_r($response);

?>