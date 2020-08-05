<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
if( isset($_POST['name'])){
    $name = $_POST['name'];
}
if( isset($_POST['phone'])){
    $phone = $_POST['phone'];
}

if( isset($_POST['email'])){
    $email = $_POST['email'];
} else {
    $email = 'tkrivobokova@gmail.com';
}
if( isset($_POST['message'])){
    $message = $_POST['message'];
}

// Формирование самого письма
$title = "New request from Best Tour Plan";
if( isset($_POST['email']) && !isset($_POST['name']) && !isset($_POST['phone'])){
    $body = "
    <h2>Thank you for subscribing</h2>
    $email successfully subscribed for Best Tour Plan newsletter.
    ";
}
if (isset($_POST['name']) && isset($_POST['phone'])) {
    $body = "
    <h2>New request</h2>
    <b>Name:</b> $name<br>
    <b>Phone:</b> $phone<br><br>
    <b>Message:</b><br>$message
    ";
}


// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'tatjanatestmail@gmail.com'; // Логин на почте
    $mail->Password   = '_vRtkG8QUX'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('tatjanatestmail@gmail.com', 'Tatjana TestMail'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($email);  


// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');