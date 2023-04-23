<?php

namespace Movie\Controllers;

use Movie\Models\Auth;
use Movie\Controllers\MovieController;
use Movie\Controllers\UserController;
use Movie\Controllers\LikeController;

class ViewController
{
    private $movieController;
    private $auth;
    private $userController;
    private $isLoggedIn;
    private $isAdmin;
    private $likeController;
    private $contactController;

    // instancie mes controllers
    public function __construct()
    {
        $this->movieController = new MovieController();
        $this->auth = new Auth();
        $this->userController = new UserController();
        $this->isLoggedIn = $this->auth->isAuthenticated();
        $this->isAdmin = $this->auth->isAdminAuthenticated();
        $this->likeController = new LikeController();
        $this->contactController = new ContactController();
    }

    // Page d'accueil
    public function home()
    {
        $pageName = "Accueil";
        //  Vérifie si l'utilisateur est connecté
        $isLoggedIn = $this->isLoggedIn;
        // verifie si l'utilisateurs connecté est un admin
        $isAdmin = $this->isAdmin;
        // recuperer les 3 derniers film ajouter par l'admin
        $lastMovies = $this->movieController->getThreeMovies();
        // recuperer les 3 films les plus aimé
        $likedMovies = $this->movieController->getMostLikedMovies();
        require('app/views/home/home.php');
    }

    // Page d'ajout de film
    public function add()
    {
        $pageName = "Ajouter un film";
        // Initialisation d'un tableau vide pour stocker leserreurs
        $errors = [];

        // si l'utilisateurs n'est pas connecté affiche

        if (!$this->isLoggedIn) {
            require('app/views/auth/login.php');
        }

        // si les donnees ne sont pas vide 
        if (!empty($_POST)) {
            $data = $_POST; // Récupérer les données du formulaire
            $file = $_FILES['image'] ?? null; // Récupérer le fichier image

            // apelle de createmovie

            $results = $this->movieController->createMovie($data, $file);

            // si la création du film a échoué affiche les erreurs
            if (isset($results['error'])) {
                $errors[] = $results['message'];
            }
        }
        require('app/views/movie/add.php');
    }

    // page modifier un film

    public function update()
    {
        $pageName = "Modifier un film";
        // Récupération de l'ID du film à mettre à jour
        $movie_id = $_POST['movie_id'];
        // recuperation du film et des informations avec les informations completes
        $movie = $this->movieController->getMovieById($movie_id, true);

        require "app/views/movie/updateMovie.php";
    }
    // valider la modification

    public function updateMovie()
    {
        // si les donnees ne sont pas vide 
        if (!empty($_POST)) {
            $data = $_POST; // Récupérer les données du formulaire
            $file = $_FILES['image'] ?? null; // Récupérer le fichier image

            $results = $this->movieController->updateMovie($data['movie_id'], $data, $file);

            // si la modification a échoué affiche les erreurs
            if (isset($results['error'])) {
                $errors[] = $results['message'];
            }
        }

        header('Location:  index.php?action=list');
    }

    // pour voir la description complet du film
    public function movieDetails()
    {
        $pageName = "Description du film";
        // On vérifie si le paramètre "id" est présent dans l'URL
        if (!isset($_GET['id'])) {
            // Si l'id n'est pas présent, on affiche la liste des films
            require('app/views/movie/list.php');
        }

        // Si l'id est présent dans l'URL
        else {
            // On récupère l'id depuis l'URL
            $movie_id = $_GET['id'];
            // On récupère toutes les informations du film correspondant à l'id
            $movie = $this->movieController->getMovieById($movie_id);

            // On affiche la page avec les détails du film
            require('app/views/movie/movieDetails.php');
        }
    }

    // Page a propos

    public function about()
    {
        $pageName = "A propos";
        // Afficher la page a propos
        require('app/views/about/about.php');
    }


    // Page de contact
    public function contact()
    {
        //  nom de la page pour l'affichage dans la vue
        $pageName = "Contact";
        
        // Initialiser les variables pour stocker les messages d"erreur et de validation
        $errors = [];
        $success = false;
    
        // Vérifier si la requête est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Appeler la méthode createMessage() de ContactController et stocker le résultat
            $result = $this->contactController->createMessage();
    
            // Si le résultat est vrai le message a été créé avec succès
            if ($result === true) {
                $success = true;
            } else {
                // Sinon, affiche une erreurs
                $errors = $result;
            }
        }
    
        // vue de la page de contact
        require('app/views/contact/contact.php');
    }
    

    // Page des mentions légales
    public function legals()
    {
        $pageName = "Mentions-Legals";
        require("app/views/legals/mentionslegales.php");
    }

    // Page RGPD
    public function rgpd()
    {
        $pageName = "RGPD";
        require("app/views/legals/rgpd.php");
    }

    // Page de liste des films
    public function list()
    {
        $pageName = "Liste de nos films";

        // On récupère tous les films
        $movies = $this->movieController->getAllMovies();

        // On affiche la liste des films
        require('app/views/movie/list.php');
    }


    // Page d'inscription
    public function register()
    {
        $pageName = "Inscription";
        // Si l'utilisateur est déjà connecté on le redirige vers la page d'accueil
        if ($this->isLoggedIn) {
            header('Location:  index.php?action=home');
        }

        // Si le formulaire est soumis, on appelle la méthode createUser() du UserController
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userController->createUser();
        }

        //  page d'inscription
        require("app/views/auth/register.php");
    }


    // Page de connexion
    public function login()
    {
        $pageName = "Connexion";
        $errors = []; // Initialisation des erreurs

        // Si l'utilisateur est déjà connecté on le redirige vers la page d'accueil
        if ($this->isLoggedIn) {
            header('Location:  index.php?action=home');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController = new UserController(); // Créez une instance de UserController
            $errors = $userController->login($errors); // Appelez la méthode login() et récupérez les erreurs
        }
        // page de connexion
        require("app/views/auth/login.php");
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        $this->auth->logout(); // Déconnexion de l'utilisateur
        $_SESSION['message'] = 'Vous êtes maintenant déconnecté.';
        header('Location:  index.php?action=home');
    }

    // page profil

    public function profil()
    {
        $pageName = "Profil";
        // Vérifier si l'utilisateur est connecté
        if (!$this->isLoggedIn) {
            // Si l'utilisateur n'est pas connecté, rediriger vers la page home
            header('Location:  ion=home');
        }

        $errors = []; // Initialisation des erreurs

        // Récupérer l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user']['id'];

        // Obtenir les informations de l'utilisateur en utilisant l'ID stocké dans $userId
        $user = $this->userController->getUserById($userId);

        // Extraire le nom pour afficher son nom et sa photo de profil
        $username = $user['name'];
        $profilePictureUrl = $user['profile_picture_url'];

        // Vérifier si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Mettre à jour les informations de l'utilisateur pour le name l'email le mot de passe et la photo
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $name = $user['name'];
            }

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $email = $user['email'];
            }

            if (isset($_POST['password']) && !empty($_POST['password'])) {
                $password = $_POST['password'];
                // hasher le mot de passe avant de l'envoyer à la méthode updateUserName()
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $hashedPassword = $user['password'];
            }
            // aucune image demandé a l'inscription donc c'est en nul tant qu'il a pas insérer une image
            $ProfilePicture = null;
            $file = $_FILES['profile_picture'] ?? null; // Récupérer le fichier image
            $results = $this->userController->updateUserName($userId, $name, $email, $hashedPassword, $file);
            // si la modification a échoué affiche les erreurs
            if (isset($results['error'])) {
                $errors[] = $results['message'];
            }
        }

        // Supprimer l'utilisateur si l'ID est présent dans la requête DELETE
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->userController->deleteUser($userId);
            session_destroy(); // Déconnecter l'utilisateur après la suppression
            header('Location:  index.php?action=home');
        }

        // Charger la vue "profil.php"
        require "app/views/auth/profil.php";
    }
    // function pour liker un film si l'utilisateur est connecter

    public function likeMovie()
    {
        $errors = [];  // Initialisation des erreurs

        // Vérifier si l'utilisateur est connecté
        if (!$this->isLoggedIn) {
            header('Location:  index.php?action=home');
        }
        // verifie que le formulaire a était soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'];
            $user_id = $_SESSION['user']['id'];

            $movieLiked = $this->likeController->read($user_id, $movie_id);
            // apeller la methode read pour vérifier si cette utilisateurs a déja liker ce film

            // si c'est le cas une erreur et rajouté a la variable $errors
            if (!empty($movieLiked)) {
                $errors[] = 'Vous avez déjà liké ce film';
                $_SESSION['errors'] = $errors;
            } else {
                $this->likeController->create($movie_id, $user_id);
            }
        }
        // Rediriger l'utilisateur vers la page liste après l'ajout d'un like
        $this->list();
    }

    // function pour disliker un film 

    public function dislikeMovie()
    {
        // Vérifie si l'utilisateur est connecté
        if (!$this->isLoggedIn) {
            header('Location:  index.php?action=home');
        }

        // Vérifie que le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'];
            $user_id = $_SESSION['user']['id'];
            // Récupère l'ID de l'utilisateur et l'ID du film

            $like = $this->likeController->read($user_id, $movie_id);
            // Vérifie que l'utilisateur a bien liké le film

            $this->likeController->delete($like['id']);
            // Supprime le like de l'utilisateur pour le film donné
        }
        // Rediriger l'utilisateur vers la page précédente après l'ajout d'un dislike
        $this->list();
    }
    // page favoris
    public function favoris()
    {
        $pageName = "Favoris";
        // Récupérer l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user']['id'];

        // Obtenir les informations de l'utilisateur en utilisant l'ID stocké dans $userId
        $user = $this->userController->getUserById($userId);
        $username = $user['name'];
        // Vérifie si l'utilisateur est connecté
        if (!$this->isLoggedIn) {
            header('Location:  index.php?action=home');
        }


        // les likes de l'utilisateur s'afficheront sur la page favoris
        $likedMovies = $this->likeController->getAllByUserId($_SESSION['user']['id']);
        require('app/views/movie/favoris.php');
    }

    // si une page est n'existe pas la page error 404 s'affichera

    public function error404()
    {
        $pageName = "Error-404";
        require('app/views/error/404.php');
    }

    public function deleteUser()
    {
        $this->userController->deleteUser();

        $this->logout();
    }

    public function deleteMovie()
    {
        // si le formulaire a était soumis 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'];
            // apelle la methode delete pour supprimer le film
            $this->movieController->deleteMovie($movie_id);
        }

        header('Location:  index.php?action=list');
    }
}
