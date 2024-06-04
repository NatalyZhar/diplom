<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $name.$surname.$email.$tel.$vacances.$resume;
    
    mail("fganu.citis@mail.ru", "Вакансии", "Письмо", "fganu.citis@mail.ru");
?>