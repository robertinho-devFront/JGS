<?php
declare(strict_types=1);

// Configuration du serveur SMTP
define('SMTP_HOST', 'smtp.ionos.fr:465');
// define('SMTP_PORT', 465);
define('SMTP_USERNAME', '   ');
define('SMTP_PASSWORD', '   ');
define('SMTP_SECURE', 'ssl'); // Peut être 'ssl' ou 'tls'
define('SMTP_DEBUG', 0); // Niveau de débogage (0 pour désactiver le débogage, 1 pour l'activer)

// Fonction pour envoyer un e-mail via SMTP
function sendEmail($to, $subject, $message, $from)
{
    // Construction des en-têtes
    $headers   = [
        "MIME-Version: 1.0",
        "Content-type: text/plain; charset=UTF-8", // Utilisation de l'encodage UTF-8
        "From: {$from} <{$from}>",
        "Reply-To: <{$from}>"
    ];

    // Construction du corps du message
    $message_body = "Subject: $subject\n\n$message";

    // Envoi de l'e-mail via SMTP
    $success = @mail($to, $subject, $message_body, implode("\r\n", $headers));
    return $success;
}

// Récupération des données du formulaire
$name       = $_POST['name'] ?? '';
$lastname   = $_POST['lastname'] ?? '';
$function   = $_POST['function'] ?? '';
$from       = $_POST['email'] ?? '';
$tel        = $_POST['tel'] ?? '';
$company    = $_POST['company'] ?? '';
$subject    = $_POST['subject'] ?? 'Message depuis le formulaire de contact';
$message    = $_POST['message'] ?? '';
$to         = 'contact@jgs-events.com';

// Envoi de l'e-mail
if (sendEmail($to, $subject, $message, $from)) {
    echo 'Le message a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi du message.';
}
?>