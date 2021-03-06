<?php

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));


$to = "rarysonps@gmail.com";
$subject = "Enviado por:  $name";
$body = "Você recebeu uma nova mensagem do formulário de contato do seu portfólio.\n\n"."Dados do usuário:\n\nNome: $name\n\nEmail: $email\n\nTelefone: $phone\n\nMensagem:\n$message";
$header = "A partir de: noreply@yourdomain.com\n";
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
