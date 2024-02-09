<?php
$name     = isset($_POST['name']) ? trim($_POST['name']) : '';
$lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
$function = isset($_POST['function']) ? trim($_POST['function']) : '';
$from     = isset($_POST['email']) ? trim($_POST['email']) : '';
$tel      = isset($_POST['tel']) ? trim($_POST['tel']) : '';
$company  = isset($_POST['company']) ? trim($_POST['company']) : '';
$subject  = isset($_POST['message']) ? trim($_POST['message']) : 'Message depuis le formulaire de contact';
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