<?php

namespace Movie\Controllers;

use Movie\Models\User;
use Movie\Models\Auth;

class UserController
{

    protected $user;
    protected $auth;

    // instancie le models user et auth

    public function __construct()
    {
        $this->user = new User();
        $this->auth = new Auth();
    }

    // Validation des données d'inscription
    private function validateInputRegister($name, $email, $password)
    {
        $errors = [];

        // Vérification du nom
        if (empty($name)) {
            $errors[] = 'Le nom est obligatoire.';
        }

        // Vérification de l'email
        if (empty($email)) {
            $errors[] = 'L\'email est obligatoire.';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email est invalide.';
        } else if ($this->auth->emailExists($email)) {
            $errors[] = 'Cet email est déjà utilisé.';
        }

        // Vérification du mot de passe
        if (empty($password)) {
            $errors[] = 'Le mot de passe est obligatoire.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Le mot de passe doit comporter au moins 6 caractères.';
        }

        return $errors;
    }


    // Méthode pour gérer le téléchargement de l'image de profil de l'utilisateur
    private function imageDownloadUsers($fileUsers)
    {
        
        $allowedExtensionsUsers = ['jpg', 'jpeg', 'png'];
        $temporyFileNameUsers = $fileUsers['tmp_name'];
        $extensionUsers = pathinfo($fileUsers['name'], PATHINFO_EXTENSION);

        if ($fileUsers['error'] === UPLOAD_ERR_OK && in_array($extensionUsers, $allowedExtensionsUsers)) {
            $uniqueNameUsers = uniqid() . '.' . $extensionUsers;
            $uploadDirectoryImg = 'data/uploadsImgUser/';
            $imageUrlUsers = $uploadDirectoryImg . $uniqueNameUsers;

            if (!move_uploaded_file($temporyFileNameUsers, $imageUrlUsers)) {
                $errors['message'] = "Erreur lors du téléchargement de l'image.";
                $errors['error'] = true;
                return $errors;
            } else {
                // Mise à jour de l'URL de l'image de profil de l'utilisateur
                $this->auth->updateProfilePicture($_SESSION['user']['id'], $imageUrlUsers);
                $_SESSION['user']['profile_picture_url'] = $imageUrlUsers;
                $_SESSION['message'] = 'Image de profil mise à jour avec succès.';
                header('Location: /horrorNotice/index.php?action=profil');
            }
        } else {
            $errors['message'] = "Erreur lors du téléchargement de l'image. Veuillez télécharger un fichier au format JPEG, JPG, ou PNG.";
            $errors['error'] = true;
            return $errors;
        }

        // Si $imageUrlUsers est null, retourne une chaîne de caractères vide
        return $imageUrlUsers ?? '';
    }

    // création d'un utilisateurs
    public function createUser()
    {
     
        // Vérification si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupération des données du formulaire
            // Utilisation des opérateurs ?? pour assigner une valeur par défaut si une variable est nulle

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validation des données
            $errors = $this->validateInputRegister($name, $email, $password);

            // Si il n'y a pas d'erreurs, enregistrement de l'utilisateur
            if (empty($errors)) {
                $profile_picture_url = '';
                $is_admin = 0;
                $this->user->createUser($name, $email, password_hash($password, PASSWORD_DEFAULT), $profile_picture_url, $is_admin);


                // Connexion de l'utilisateur
                $this->auth->login($email, $password);
                $_SESSION['message'] = 'Inscription réussie et connexion effectuée.';
                header('Location: /horrorNotice/index.php?action=home'); // Redirection vers la page d'accueil
            }
        }
        // Affichage de la vue du formulaire d'inscription
        require('app/views/auth/register.php');
    }



    // Validation des données de connexion
    private function validateLogin($email, $password)
    {

           $errors = [];
        // Vérification de l'email
        if (empty($email)) {
            $errors[] = 'L\'email est obligatoire.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email est invalide.';
        }

        // Vérification du mot de passe
        if (empty($password)) {
            $errors[] = 'Le mot de passe est obligatoire.';
        }

        return $errors;
    }

    public function login($errors)
    {
        
        // Vérification si l'utilisateur est déjà connecté
        if ($this->auth->isAuthenticated()) {
            header('Location: /horrorNotice/index.php?action=home');
        }
        $errors = [];
        
        // Vérification si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupération des données du formulaire
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validation des données
            $errors = $this->validateLogin($email, $password);

            // Si il n'y a pas d'erreurs, connexion de l'utilisateur
            if (empty($errors)) {
                $user = $this->auth->readByEmail($email);
                if ($user && password_verify($password, $user['password'])) {
                    $this->auth->login($email, $password); // Connexion de l'utilisateur
                    $_SESSION['message'] = 'Connexion réussie.';
                    header('Location: /horrorNotice/index.php?action=home'); // Redirection vers la page d'accueil

                } else {
                    $errors[] = 'Email ou mot de passe incorrect.';
                }
            }
        }

        return $errors;
    }

    // retourne les informations d'un utilisateur

    public function getUserById($id)
    {
        return $this->user->read($id);
    }

    // modifier les informations d'un users

    public function updateUserName($id, $newName, $newEmail, $newPassword, $fileUser)
    {
        // Obtenir l'ID de l'utilisateur actuellement connecté (à adapter en fonction de votre implémentation)
        $currentUser = $this->auth->getCurrentUser();
        $newProfilePicture = $this->imageDownloadUsers($fileUser);

        if (isset($newProfilePicture['error'])) {
            // retourne une erreur
            return $newProfilePicture;
        }

        // Vérifier si l'utilisateur actuel est autorisé à modifier le compte
        if ($id === $currentUser['id']) {
            $this->user->update($id, $newName, $newEmail, $newPassword, $newProfilePicture);
            $_SESSION['message'] = "Le nom d'utilisateur a été mis à jour avec succès.";
        } else {
            // L'utilisateur n'est pas autorisé à modifier ce compte

            $_SESSION['error'] = "Vous n'êtes pas autorisé à modifier ce compte.";
           
        }
    }

    // supprimer un users

    public function deleteUser()
    {
        $userId = $_POST['user_id'];

        // Supprimer l'utilisateur correspondant à l'ID récupéré
        $result = $this->user->delete($userId);

        if ($result) {
            // La suppression a été effectuée avec succès
            $_SESSION['message'] = 'L\'utilisateur a été supprimé avec succès.';
            header('Location: /horrorNotice/index.php?action=profil');
        } else {
            // La suppression a échoué
            $_SESSION['error'] = 'Erreur lors de la suppression de l\'utilisateur.';
            header('Location: /horrorNotice/index.php?action=profil');
        }
    }
}
