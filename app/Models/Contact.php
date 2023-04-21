<?php

namespace Movie\Models;

use PDO;
use PDOException;

class Contact extends Manager
{
    public string $name;
    public string $email;
    public string $profile_picture_url;
    public string $surname;
    public string $message;

    // créer un  message de contact
    public function create(string $name, string $email, string $profile_picture_url, string $surname, string $message)
    {
        try {
            $query = 'INSERT INTO contacts (name, email, profile_picture_url, surname, message) VALUES (:name, :email, :profile_picture_url, :surname, :message)';
            $params = [
                ':name' => $name,
                ':email' => $email,
                ':profile_picture_url' => $profile_picture_url,
                ':surname' => $surname,
                ':message' => $message
            ];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
            
            echo "Erreur lors de l'envoi du message de contact : " . $e->getMessage();
            return false;
        }
    }

    // Lecture d'un message de contact par son ID
    public function read(int $id)
    {
        try {
            $query = 'SELECT * FROM contacts WHERE id = :id';
            $params = [':id' => $id];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la lecture du message de contact : " . $e->getMessage();
            return null;
        }
    }

    // Mise à jour d'un message de contact par son ID
    public function update(int $id, string $name, string $email, string $profile_picture_url, string $surname, string $message)
    {
        try {
            $query = 'UPDATE contacts SET name = :name, email = :email, profile_picture_url = :profile_picture_url, surname = :surname, message = :message WHERE id = :id';
            $params = [
                ':id' => $id,
                ':name' => $name,
                ':email' => $email,
                ':profile_picture_url' => $profile_picture_url,
                ':surname' => $surname,
                ':message' => $message
            ];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
           
            echo "Erreur lors de la mise à jour du message de contact : " . $e->getMessage();
            return false;
        }
    }

    // Suppression d'un message de contact par son ID
    public function delete(int $id)
    {
        try {
            $query = 'DELETE FROM contacts WHERE id = :id';
            $params = [':id' => $id];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
           
            echo "Erreur lors de la suppression du message de contact : " . $e->getMessage();
            return false;
        }
    }
}