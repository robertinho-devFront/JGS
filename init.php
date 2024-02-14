<?php
// Configuration du serveur SMTP
define('SMTP_HOST', 'smtp.ionos.fr');
define('SMTP_PORT', 465); // Le port SMTP pour SSL
define('SMTP_USERNAME', 'contact@jgs-events.com');
define('SMTP_PASSWORD', '@hEVxvkUHM8vVCE');
define('SMTP_SECURE', 'ssl'); // Utilisation de SSL/TLS
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

    // Envoi de l'e-mail via SMTP
    $success = @mail($to, $subject, $message, implode("\r\n", $headers));
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

// Construction du contenu du message
$messageContent = "Nom: $name\n";
$messageContent .= "Prénom: $lastname\n";
$messageContent .= "Fonction: $function\n";
$messageContent .= "Email: $from\n";
$messageContent .= "Téléphone: $tel\n";
$messageContent .= "Société: $company\n";
$messageContent .= "Message:\n$message";

// Envoi de l'e-mail
if (sendEmail($to, $subject, $messageContent, $from)) {
    echo 'Le message a été envoyé avec succès.';
} else {
    echo 'Une erreur est survenue lors de l\'envoi du message.';
}
?>
