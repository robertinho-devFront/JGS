<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require 'init.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Récupérer les données du formulaire
$name    = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : '';
$from    = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['subject']) ? filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING) : '';
$message = isset($_POST['message']) ? filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING) : '';
$to      = 'rdasilva75@gmail.com';

// Valider l'adresse e-mail
if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['message' => 'Adresse e-mail non valide.', 'error' => true]);
    die;
}

// Échapper les données
$name    = addslashes($name);
$subject = addslashes($subject);
$message = addslashes($message);

// Configuration de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port       = SMTP_PORT;

    // Destinataire et expéditeur
    $mail->setFrom($from, $name);
    $mail->addAddress('rdasilva75@gmail.com');
    
    // Contenu de l'e-mail
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Envoyer l'e-mail
    if ($mail->send()) {
        echo json_encode(['message' => 'E-mail accepté pour livraison. Veuillez vérifier votre boîte de réception.']);
    } else {
        echo json_encode(['message' => 'Erreur lors de l\'envoi de l\'e-mail. Veuillez réessayer.', 'error' => $mail->ErrorInfo]);
    }
} catch (Exception $e) {
    echo json_encode(['message' => 'Erreur lors de l\'envoi de l\'e-mail. Veuillez réessayer.', 'error' => $e->getMessage()]);
}

die;
?>
