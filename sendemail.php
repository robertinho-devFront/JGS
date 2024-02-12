<?php
declare(strict_types=1);

error_reporting(E_ALL);

// Récupération des données du formulaire
$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$function = $_POST['function'] ?? '';
$from = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$company = $_POST['company'] ?? '';
$messageContent = $_POST['message'] ?? '';

// Construction du contenu du message
$message = "Nom: $name\n";
$message .= "Prénom: $lastname\n";
$message .= "Fonction: $function\n";
$message .= "Email: $from\n";
$message .= "Téléphone: $tel\n";
$message .= "Société: $company\n";
$message .= "Message:\n$messageContent";

// Destinataire et sujet de l'email
$to = 'contact@jgs-events.com';
$subject = 'Message depuis le formulaire de contact';

// En-têtes de l'email
$headers = [
    "MIME-Version: 1.0",
    "Content-type: text/plain; charset=UTF-8",
    "From: $name <$from>",
    "Reply-To: <$from>"
];

// Envoi de l'email
if (mail($to, $subject, $message, implode("\r\n", $headers))) {
    echo 'Le message a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi du message.';
}
?>

