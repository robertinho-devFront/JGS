
// $(document).ready(function() {
//     $('#main-contact-form').submit(function(e) {
//         e.preventDefault(); // Empêche l'envoi du formulaire par défaut
        
//         // Récupérer les données du formulaire
//         var formData = $(this).serialize();
        
//         // Envoyer les données du formulaire à sendemail.php en utilisant AJAX
//         $.ajax({
//             type: 'POST',
//             url: 'sendemail.php',
//             data: formData,
//             success: function(response) {
//                 // Afficher la réponse du serveur dans la console ou dans une boîte de dialogue
//                 console.log(response);
//                 if (response === 'success') {
//                     // Afficher un message de succès à l'utilisateur
//                     alert('Votre message a été envoyé avec succès !');
//                 } else {
//                     // Afficher un message d'erreur à l'utilisateur
//                     alert('Votre message a été envoyé avec succès !');
//                 }
//             },
//             error: function(xhr, status, error) {
//                 // Gérer les erreurs éventuelles
//                 console.error(xhr.responseText);
//                 alert('stop');
//             }
//         });
//     });
// });