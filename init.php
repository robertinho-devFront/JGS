<?php

// Inclure le fichier d'initialisation
include 'init.php';

// Utiliser les constantes pour configurer l'envoi d'e-mail
$name    = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : '';
$from    = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['subject']) ? filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING) : '';
$message = isset($_POST['message']) ? filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING) : '';
$to  = 'rdasilva75@gmail.com';

// Configurer le serveur SMTP
// Configuration du serveur SMTP
define('SMTP_HOST', 'smtp.ionos.fr');
define('SMTP_PORT', 465);
define('SMTP_USERNAME', 'contact@jgs-events.com');
define('SMTP_PASSWORD', 'JIGSAW_12.2023!');
define('SMTP_SECURE', 'ssl'); // Peut être 'ssl' ou 'tls'
define('SMTP_DEBUG', 0); // Niveau de débogage (0 pour désactiver le débogage, 1 pour l'activer)

// Envoyer l'e-mail
mail($to, $subject, $message, $headers);

?>

