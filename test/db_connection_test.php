<?php

// Assurez-vous d'inclure l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

require_once "../app/models/Manager.php";



use Dotenv\Dotenv;
use Movie\Models\Manager;

// Charger les variables d'environnement du fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


$dbname = $_POST['DB_NAME'];
$username = $_POST['DB_USER'];
$password = $_POST['DB_PASSWORD'];

if ($dbname && $username) {
    
    $_ENV['DB_NAME'] = $dbname;
    $_ENV['DB_USER'] = $username;
    $_ENV['DB_PASSWORD'] = $password; 
}

    try {
       
        $connection = Manager::dbConnect(); 

        echo "Connexion réussie à la base de données.";
        header("location: ../index.php");
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données :";
    }

?>

