<?php
namespace Cookasian\Controllers;

class ContactController
{
    public function index(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Variables de session pour les messages flash
        $contactSuccess = $_SESSION['contact_success'] ?? null;
        $contactErrors  = $_SESSION['contact_errors'] ?? [];
        $contactValues  = $_SESSION['contact_values'] ?? [
            'nom' => '',
            'email' => '',
            'message' => ''
        ];

        // Nettoyage après lecture
        unset($_SESSION['contact_success'], $_SESSION['contact_errors']);

        // Si le formulaire est envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom     = trim($_POST['nom'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            $errors = [];

            if ($nom === '') $errors['nom'] = "Le nom est requis.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse e-mail invalide.";
            if ($message === '') $errors['message'] = "Le message ne peut pas être vide.";

            if (empty($errors)) {
                $_SESSION['contact_success'] = "Merci pour ton message ! Nous te répondrons rapidement 🌸";
                header('Location: /contact');
                exit;
            } else {
                $_SESSION['contact_errors'] = $errors;
                $_SESSION['contact_values'] = compact('nom', 'email', 'message');
                header('Location: /contact');
                exit;
            }
        }

        // Variables de la vue
        $title = "Contact - Cookasian";
        $metaDescription = "Contactez Cookasian pour toute question, suggestion ou partenariat.";

        // ✅ On charge uniquement la vue complète (qui inclut déjà header et footer)
        require __DIR__ . "/../Views/contact/contact.php";
    }
}
?>
