
<?php
error_reporting(E_ALL);


// ini_set("SMTP", "smtp.gmail.com");
// ini_set("smtp_port", "25");*/

$name     = isset($_POST['name']) ? trim($_POST['name']) : '';
$lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
$function = isset($_POST['function']) ? trim($_POST['function']) : '';
$from     = isset($_POST['email']) ? trim($_POST['email']) : '';
$tel      = isset($_POST['tel']) ? trim($_POST['tel']) : '';
$company  = isset($_POST['company']) ? trim($_POST['company']) : '';
$subject  = isset($_POST['subject']) ? trim($_POST['subject']) : 'Message depuis le formulaire de contact';
$message  = isset($_POST['message']) ? trim($_POST['message']) : '';
$to       = 'contact@jgs-events.com';

$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=UTF-8"; // Utilisation de l'encodage UTF-8
$headers[] = "From: {$name} <{$from}>";
$headers[] = "Reply-To: <{$from}>";

if (mail($to, $subject, $message, implode("\r\n", $headers))) {
    echo 'Le message a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi du message.';
}
?>

<?php

error_reporting(E_ALL);
/*
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "25");*/

$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = isset($_POST['subject']) ? trim($_POST['subject']) : 'Message depuis le formulaire de contact';
$message    = @trim(stripslashes($_POST['message'])); 
$to   		= 'rdasilva@gmail.com';

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: {$name} <{$from}>";
$headers[] = "Reply-To: <{$from}>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion();

if (mail($to, $subject, $message, implode("\r\n", $headers))) {
    echo 'Le message a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi du message.';
}

die;?>