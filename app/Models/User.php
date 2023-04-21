<?php

namespace Movie\Models;

use PDO;
use PDOException;


class User extends Manager
{

    public string $name;
    public string $email;
    public string $password;
    public string $profile_picture_url;
    public int $is_admin;

    // crée un nouvel utilisateur dans la base de données
    public function createUser(string $name, string $email, string $password, string $profile_picture_url, int $is_admin)
    {
        try {
            $query = 'INSERT INTO users (name, email, password, profile_picture_url, is_admin) VALUES (:name, :email, :password, :profile_picture_url, :is_admin)';
            $params = [
                ':name' => $name,
                ':email' => $email,
                ':password' => $password,
                ':profile_picture_url' => $profile_picture_url,
                ':is_admin' => $is_admin,
            ];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo ("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }

    // récupère un utilisateur par son ID
    public function read(int $id)
    {
        try {
            $query = 'SELECT * FROM users WHERE id = :id';
            $params = [':id' => $id];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // mets à jour les informations d'un utilisateur dans la base de données
    public function update(int $id, string $name, string $email, string $password, string $profile_picture_url = '', int $is_admin = 0)
    {
        try {
            $query = 'UPDATE users SET name = :name, email = :email, password = :password, profile_picture_url = :profile_picture_url, is_admin = :is_admin WHERE id = :id';
            $params = [
                ':id' => $id,
                ':name' => $name,
                ':email' => $email,
                ':password' => $password,
                ':profile_picture_url' => $profile_picture_url,
                ':is_admin' => $is_admin,
            ];
            $stmt = $this->executeQuery($query, $params);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // supprime un utilisateur de la base de données
    public function delete(int $id)
    {
        try {
            $query = 'DELETE FROM users WHERE id = :id';
            $params = [':id' => $id];
            $stmt = $this->executeQuery($query, $params);
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }
}
