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
$messageContent .= "Email: $from\n";
$messageContent .= "Telephone: $tel\n";
$messageContent .= "Sujet: $subject\n";
$messageContent .= "Message:\n$message\n";

// Si un avatar est téléchargé, inclure son chemin dans le message
if (!empty($avatarPath)) {
    $messageContent .= "Avatar: $avatarPath\n";
}

// Envoi de l'e-mail
if (mail($to, $subject, $messageContent)) {
    echo 'success';
} else {
    echo 'error';
}
?>