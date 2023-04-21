<?php

namespace Movie\Models;


use PDO;
use PDOException;

class Auth extends Manager
{

    public string $email;
    public string $password;
    // Vérifie si un utilisateur existe en base de données et si son mot de passe est correct
    private function authenticate(string $email, string $password)
    {
        try {
            $user = $this->readByEmail( $email);

            if ($user && password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'authentification de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Connecte un utilisateur en vérifiant les identifiants fournis, puis stocke les données utilisateur dans la session.
    public function login(string $email, string $password)
    {
        try {
            $user = $this->authenticate($email, $password);

            if ($user) {

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'is_admin' => $user['is_admin'],
                    'profile_picture_url' => $user['profile_picture_url']
                ];
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Supprime les données utilisateur de la session et détruit la session
    public function logout()
    {
        try {
            session_unset();
            session_destroy();
        } catch (PDOException $e) {
            echo "Erreur lors de la déconnexion de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Permet de vérifier si un utilisateur est authentifié ou non
    public function isAuthenticated()
    {
        try {
            if (isset($_SESSION['user']) && $_SESSION['user'] !== null) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification de l'authentification de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // permet de verifier si l'utilisateur qui est connecté est admin
    public function isAdminAuthenticated()
    {
        try {
            $isLoggedIn = $this->isAuthenticated();
            if ($isLoggedIn && $_SESSION['user']['is_admin'] === 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification des privilèges de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    //  récupère un utilisateur dans la base de données en utilisant son email
    public function readByEmail(string $email)
    {
        try {
            $query = 'SELECT * FROM users WHERE email = :email';
            $params = [':email' => $email];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Vérifie si un email existe dans la base de données
    public function emailExists(string $email)
    {
        try {
            $query = 'SELECT COUNT(*) FROM users WHERE email = :email';
            $params = [':email' => $email];
            $stmt = $this->executeQuery($query, $params);
            $result = $stmt->fetchColumn();
            return $result > 0 ? true : false;
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification de l'existence de l'email : " . $e->getMessage();
            return false;
        }
    }

    // Récupère l'utilisateur actuellement connecté en vérifiant la session, ou renvoie null si aucun utilisateur n'est connecté

    public function getCurrentUser()
    {
        try {
            // verifiez qu'un utilisateur est connecté avant d'accéder à ses informations
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            }

            return null;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de l'utilisateur courant : " . $e->getMessage();
            return false;
        }
    }

    // mettre a jour la photo de l'utilisateur

    public function updateProfilePicture(int $id, string $profile_picture_url)
    {
        try {
            $query = 'UPDATE users SET profile_picture_url = :profile_picture_url WHERE id = :id';
            $params = [
                ':id' => $id,
                ':profile_picture_url' => $profile_picture_url
            ];
            $stmt = $this->executeQuery($query, $params);


            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la mise à jour de l'image de profil : " . $e->getMessage();
            return false;
        }
    }
}
