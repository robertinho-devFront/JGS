<?php
error_reporting(E_ALL);

// Paramètres SMTP
ini_set('SMTP', 'smtp.ionos.fr'); // Adresse du serveur SMTP
ini_set('smtp_port', 465); // Port SMTP (SSL)
ini_set('sendmail_from', 'contact@jgs-events.com'); // Adresse e-mail expéditeur par défaut

$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=UTF-8";
$headers[] = "From: contact@jgs-events.com";
$headers[] = "Reply-To: contact@jgs-events.com";

// Récupération des données du formulaire
$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$function = $_POST['function'] ?? '';
$from = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$company = $_POST['company'] ?? '';
$subject = $_POST['subject'] ?? 'Message depuis le formulaire de contact';
$message = $_POST['message'] ?? '';
$to = 'contact@jgs-events.com';

// Récupération du fichier avatar s'il est téléchargé
$avatar = $_FILES['avatar'] ?? null;

// Chemin de destination pour le fichier avatar
$uploadDirectory = 'avatars/';
$avatarPath = '';

// Si un fichier avatar est téléchargé
if ($avatar && $avatar['error'] === UPLOAD_ERR_OK) {
    // Générer un nom de fichier unique
    $avatarFileName = uniqid('avatar_') . '_' . basename($avatar['name']);
    // Déplacer le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($avatar['tmp_name'], $uploadDirectory . $avatarFileName)) {
        $avatarPath = $uploadDirectory . $avatarFileName;
    }
}

// Construction du contenu du message
$messageContent = "Nom: $name\n";
$messageContent .= "Prenom: $lastname\n";
$messageContent .= "Fonction: $function\n";
$messageContent .= "Email: $from\n";
$messageContent .= "Telephone: $tel\n";
$messageContent .= "Society: $company\n";
$messageContent .= "Sujet: $subject\n";
$messageContent .= "Message:\n$message\n";

// Si un avatar est téléchargé, inclure son chemin dans le message
if (!empty($avatarPath)) {
    $messageContent .= "Avatar: $avatarPath\n";
}

// Envoi de l'e-mail
if (mail($to, $subject, $messageContent, implode("\r\n", $headers))) {
    echo 'success';
} else {
    echo 'error';
}
?>