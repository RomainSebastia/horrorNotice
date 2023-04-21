<?php

namespace Movie\Models;


use PDO;
use PDOException;

class Like extends Manager
{
    public int $id_movie;
    public int $id_users;

    // Crée un nouveau like dans la base de données
    public function create(int $id_movie, int $id_users)
    {
        try {
            $query = 'INSERT INTO likes (id_movie, id_users) VALUES (:id_movie, :id_users)';
            $params = [
                ':id_movie' => $id_movie,
                ':id_users' => $id_users,
            ];
            return $this->executeQuery($query, $params);
        } catch (PDOException $e) {
            echo "Erreur lors de la création du like : " . $e->getMessage();
            return false;
        }
    }

    // lire le like en fonction de l'id de l'users et de l'id du film
    public function readLikeByUserAndMovie(int $id_users, int $id_movie)
    {
        try {
            $query = 'SELECT * FROM likes WHERE id_users = :id_users AND id_movie = :id_movie';
            $params = [
                ':id_users' => $id_users,
                ':id_movie' => $id_movie,
            ];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération du like : " . $e->getMessage();
            return false;
        }
    }

    // Met à jour un like en fonction de l'id du likes le l'id du film et l'id du movie
    public function update(int $id, int $id_movie, int $id_users)
    {
        try {
            $query = 'UPDATE likes SET id_movie = :id_movie, id_users = :id_users WHERE id = :id';
            $params = [
                ':id' => $id,
                ':id_movie' => $id_movie,
                ':id_users' => $id_users,
            ];
            return $this->executeQuery($query, $params);
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du like : " . $e->getMessage();
            return false;
        }
    }

    // Supprime un like d'un utilisateur pour enlever le film de ses favoris
    public function delete(int $id)
    {
        try {
            $query = 'DELETE FROM likes WHERE id = :id';
            $params = [':id' => $id];
            $this->executeQuery($query, $params);
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du like : " . $e->getMessage();
            return false;
        }
    }


    // Récupère tous les likes d'un utilisateur pour sa page favoris
    public function readAllLikeByUserId(int $id_users)
    {
        try {
            $query = 'SELECT movie.id, movie.title, movie.description, movie.release_date FROM movie AS movie INNER JOIN likes ON movie.id = likes.id_movie WHERE likes.id_users = :id_users';
            $params = [
                ':id_users' => $id_users,
            ];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des likes : " . $e->getMessage();
            return false;
        }
    }
}
