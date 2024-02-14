<?php
error_reporting(E_ALL);

// Récupération des données du formulaire
$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$from = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$subject = $_POST['subject'] ?? 'Message depuis le formulaire de contact';
$message = $_POST['message'] ?? '';
$to = 'contact@jgs-events.com';

// Construction du contenu du message
$messageContent = "Nom: $name\n";
$messageContent .= "Prénom: $lastname\n";
$messageContent .= "Email: $from\n";
$messageContent .= "Téléphone: $tel\n";
$messageContent .= "Sujet: $subject\n";
$messageContent .= "Message:\n$message";

// Envoi de l'e-mail
if (mail($to, $subject, $messageContent)) {
    echo 'success';
} else {
    echo 'error';
}
?>