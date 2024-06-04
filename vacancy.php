<?php
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $vacances = $_POST["vacances"];
    $resume = $_POST["resume;"]
    $message = $name.$surname.$email.$tel.$vacances.$resume;
    
    mail("reference.citis@gmail.com", "Вакансии", "Письмо", "reference.citis@gmail.com");
?>