<?php

if(isset($_POST['submit']))
{
    $to      = 'kendirbaev.aibek@gmail.com';
    $subject = 'Ошибка в тексте! ';
    $message = 'hello';
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    header('Location: ' . $_SERVER['HTTP_REFERER'].'?send=true');
}
else
{
    header('Location: ' . $_SERVER['HTTP_REFERER'].'?send=false');
}

?>