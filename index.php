<?php

// je démarre la session si elle n'existe pas déjà
if (!isset($_SESSION)) {
    session_start();
}

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    // je créer une nouvelle instance de ViewController
    $viewController = new \Movie\Controllers\ViewController();

    // je vérifie si action est défini dans $_GET sinon j'attribue home par défaut
    $action = $_GET['action'] ?? 'home';

    // si action n'est pas vide en fonction de l'action de l'utilisateur il sera redirigé vers la page
    if (!empty($action)) {
        switch ($action) {
            case 'home':
                $viewController->home();
                break;
            case 'about':
                $viewController->about();
                break;
            case 'contact':
                $viewController->contact();
                break;
            case 'mentions-legals':
                $viewController->legals();
                break;
            case 'rgpd':
                $viewController->rgpd();
                break;
            case 'list':
                $viewController->list();
                break;
            case 'details':
                $viewController->movieDetails();
                break;
            case 'add':
                $viewController->add();
                break;
            case 'update':
                $viewController->update();
                break;
            case 'updateMovie':
                $viewController->updateMovie();
                break;
            case 'deleteMovie':
                $viewController->deleteMovie();
                break;
            case 'register':
                $viewController->register();
                break;
            case 'login':
                $viewController->login();
                break;
            case 'logout':
                $viewController->logout();
                break;
            case 'profil':
                $viewController->profil();
                break;
            case 'deleteUser':
                $viewController->deleteUser();
                break;
            case 'likeMovie':
                $viewController->likeMovie();
                break;
            case 'dislikesMovie':
                $viewController->dislikeMovie();
                break;
            case 'favoris':
                $viewController->favoris();
                break;
            default:
                $viewController->error404();
                break;
        }
    }
} catch (Exception $e) {
    die("Une erreur est survenue : " . $e->getMessage());
}
