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

        // Récupérer les données du formulaire
        $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
        $surname = htmlspecialchars($_POST['surname'] ?? '', ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');



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
