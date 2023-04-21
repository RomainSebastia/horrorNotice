<?php

namespace Movie\Models;

use PDO;
use PDOException;

abstract class Manager
{
    private static $dbConnection = null;

    // Établit la connexion à la base de données

    protected static function dbConnect()
    {
        $databaseName = $_ENV['DB_NAME'];
        $databaseHost = $_ENV['DB_HOST'];
        $databasePort = $_ENV['DB_PORT'];
        $databaseUser = $_ENV['DB_USER'];
        $databasePassword = $_ENV['DB_PASSWORD'];

        $dataSourceName = "mysql:dbname=$databaseName;host=$databaseHost;port=$databasePort;charset=utf8";

        if (isset(self::$dbConnection)) {
            return self::$dbConnection;
        } else {
            try {
                self::$dbConnection = new PDO($dataSourceName, $databaseUser, $databasePassword);
                self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$dbConnection;
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
    }

    // Prépare et exécute une requête SQL, retourne un objet PDOStatement
    protected function executeQuery($query, $params)
    {
        $pdo = self::dbConnect();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
