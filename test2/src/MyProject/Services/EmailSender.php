<?php

namespace MyProject\Services;

use MyProject\Models\Users\User;

class EmailSender
{
    
    public static function send(
        
        User $receiver,
        string $subject,
        string $templateName,
        array $templateVars = []
    ): void {
        extract($templateVars);

        ob_start();
        require __DIR__ . '/../../../templates/mail/' . $templateName;
        $body = ob_get_contents();
        ob_end_clean();

        mail('vaskaananas@yandex.ru', $subject, $body, 'From: vaskaananas@yandex.ru');
    }
}

/*
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ .'/PHPMailer.php';
require __DIR__ .'/SMTP.php';
require __DIR__ .'/Exception.php';

class EmailSender
{
        public static function send2():void{
            $title = "Заголовок письма";
        $body = "
        <h2>Новое письмо</h2>
        <b>Имя:</b> $name<br>
        <b>Почта:</b> $email<br><br>
        <b>Сообщение:</b><br>$text
        ";
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPKeepAlive = true;
        $mail->SMTPAuth= true;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'Василий Ананасов'; // Логин на почте
        $mail->Password   = 'privetmir123'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('mail@gmail.com', 'Имя отправителя'); 
        $mail->addAddress('ananasik20202020@gmail.com', 'Василий Ананасов');  // кому (email и имя)               
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body; 
        // html текст письма
        if ($mail->send()) {
          echo 'Письмо отправлено!';
        } else {
          echo 'Ошибка: ' . $mail->ErrorInfo;
        }
    }
}
*/