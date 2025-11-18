<?php
namespace Cookasian\Controllers;

use Cookasian\Models\ContactModel;

class ContactController
{
    public function index(): void
    {
        // Je démarre la session si besoin (pour les messages flash)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Je récupère les éventuels messages du formulaire précédent
        $contactSuccess = $_SESSION['contact_success'] ?? null;
        $contactErrors  = $_SESSION['contact_errors'] ?? [];
        $contactValues  = $_SESSION['contact_values'] ?? [
            'nom' => '',
            'email' => '',
            'message' => ''
        ];

        // Une fois lus, je les nettoie
        unset($_SESSION['contact_success'], $_SESSION['contact_errors']);

        // Si le formulaire est envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Je récupère les champs du formulaire
            $nom     = trim($_POST['nom'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            $errors = [];

            // Vérifications simples
            if ($nom === '') $errors['nom'] = "Le nom est requis.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse e-mail invalide.";
            if ($message === '') $errors['message'] = "Le message ne peut pas être vide.";

            // Si tout est bon, j’enregistre le message
            if (empty($errors)) {

                // Enregistrement en base
                $model = new ContactModel();
                $model->enregistrerMessage($nom, $email, $message);

                // Message de succès
                $_SESSION['contact_success'] = "Merci pour ton message ! Nous te répondrons rapidement 🌸";

                // Petite redirection pour éviter de renvoyer le formulaire
                header('Location: /contact');
                exit;
            } 

            // Sinon je renvoie les erreurs et les valeurs pour éviter à l'utilisateur de tout retaper
            $_SESSION['contact_errors'] = $errors;
            $_SESSION['contact_values'] = compact('nom', 'email', 'message');

            header('Location: /contact');
            exit;
        }

        // Titre et description pour la vue
        $title = "Contact";
        $metaDescription = "Contactez Cookasian pour toute question, suggestion ou partenariat.";

        // J'affiche simplement ma vue contact
        require __DIR__ . "/../Views/contact/contact.php";
    }
}
?>
