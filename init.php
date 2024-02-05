<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Configuration du serveur SMTP
define('SMTP_HOST', 'smtp.ionos.fr');
define('SMTP_PORT', 465);
define('SMTP_USERNAME', 'rdasilva75@gmail.com');
define('SMTP_PASSWORD', 'JIGSAW_12.2023!');
define('SMTP_SECURE', 'ssl'); // Peut être 'ssl' ou 'tls'
define('SMTP_DEBUG', 0); // Niveau de débogage (0 pour désactiver le débogage, 1 pour l'activer)

// Fonction pour envoyer un e-mail via SMTP
function sendEmail($to, $subject, $message, $from)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;

        $mail->setFrom(SMTP_USERNAME, $from);
        $mail->addAddress($to);
        $mail->addAddress('rdasilva75@gmail.com');
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>