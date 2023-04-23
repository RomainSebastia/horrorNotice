<?php

namespace Movie\Controllers;

use Movie\Models\Contact;

class ContactController
{
    private $contactModel;

    // Instancie le models Contact
    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function createMessage()
    {
        $errors = [];

        // Récupérer les données du formulaire et les nettoyer avec htmlspecialchars
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $message = $_POST['message'] ?? '';

        // Envoyer le message à la base de données en utilisant la méthode create
        if ($this->contactModel->create($name, $email, $surname, $message)) {
            // Le message a été envoyé avec succès
            $_SESSION['message'] = "Message de contact envoyé avec succès.";
            // retourne true s'il n'y a pas d'erreur
            return true;
        } else {
            // sinon une erreur
            $errors[] = "Une erreur s'est produite lors de l'envoi du message de contact.";
            $_SESSION['errors'] = $errors;
            // retourne false s'il y a des erreurs
            return false;
        }
    }
}
