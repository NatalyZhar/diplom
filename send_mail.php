<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "./PHPMailer/Exception.php";
    require "./PHPMailer/PHPMailer.php";

    $mail = new PHPMailer(true);
	
    $mail->CharSet = "UTF-8";
    $mail->IsHTML(true);

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
	$tel = $_POST["tel"];
	$email_template = "./template_mail.html";

    $body = file_get_contents($email_template);
	$body = str_replace('%name%', $name, $body);
    $body = str_replace('%surname%', $surname, $body);
	$body = str_replace('%email%', $email, $body);
	$body = str_replace('%tel%', $tel, $body);

    if (!empty($_FILES["application"]["tmp_name"])) {
        // путь загрузки файла
        $filePath = __DIR__ . "/" . $_FILES["application"]["name"];
        // грузим файл
        if (copy($_FILES["application"]["tmp_name"], $filePath)) {
            $fileAttach = $filePath;
            $mail->addAttachment($fileAttach);
        }
    }
    $mail->addAddress("reference.citis@gmail.com");
	$mail->setFrom($email);
    $mail->Subject = "Заявка с формы";
    $mail->MsgHTML($body);

    if (!$mail->send()) {
        $message = "Ошибка отправки";
    } else {
        $message = "Данные отправлены!";
    }
	
	$response = ["message" => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>