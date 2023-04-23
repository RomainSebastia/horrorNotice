<?php

namespace Movie\Models;

use PDOException;

class Contact extends Manager
{
    public string $name;
    public string $email;
    public string $surname;
    public string $message;

    // créer un message de contact

    public function create(string $name, string $email, string $surname, string $message)
    {
        try {
            $query = 'INSERT INTO contacts (name, email, surname, message) VALUES (:name, :email, :surname, :message)';
            $params = [
                ':name' => $name,
                ':email' => $email,
                ':surname' => $surname,
                ':message' => ($message)
            ];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {

            echo "Erreur lors de l'envoi du message de contact : " . $e->getMessage();
            return false;
        }
    }
}
