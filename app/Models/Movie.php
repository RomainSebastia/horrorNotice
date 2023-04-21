<?php

namespace Movie\Models;
use PDO;
use PDOException;

class Movie extends Manager
{
    public string $title;
    public string $release_date;
    public string $actors_actresses;
    public string $genre;
    public int $duration;
    public string $image_url;
    public string $description;

    // Création d'un film 
    public function create(string $title, string $release_date, string $actors_actresses, string $genre, int $duration, string $image_url, string $description)
    {
        try {
            $query = 'INSERT INTO movie (title, release_date, actors_actresses, genre, duration, image_url, description) VALUES (:title, :release_date, :actors_actresses, :genre, :duration, :image_url, :description)';
            $params = [
                ':title' => $title,
                ':release_date' => $release_date,
                ':actors_actresses' => $actors_actresses,
                ':genre' => $genre,
                ':duration' => $duration,
                ':image_url' => $image_url,
                ':description' => $description,
            ];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la création du film : " . $e->getMessage();
            return false;
        }
    }

    // Lecture d'un film par son ID
    public function read(int $id)
    {
        try {
            $query = 'SELECT * FROM movie WHERE id = :id';
            $params = [':id' => $id];
            $stmt = $this->executeQuery($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            echo "Erreur lors de la lecture du film : " . $e->getMessage();
            return false;
        }
    }

    // mise à jour d'un film 
    public function update(int $id, string $title, string $release_date, string $actors_actresses, string $genre, int $duration, string $image_url, string $description)
    {
        try {
            $query = 'UPDATE movie SET title = :title, release_date = :release_date, actors_actresses = :actors_actresses, genre = :genre, duration = :duration, image_url = :image_url, description = :description WHERE id = :id';
            $params = [
                ':id' => $id,
                ':title' => $title,
                ':release_date' => $release_date,
                ':actors_actresses' => $actors_actresses,
                ':genre' => $genre,
                ':duration' => $duration,
                ':image_url' => $image_url,
                ':description' => $description,
            ];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la mise à jour du film : " . $e->getMessage();
            return false;
        }
    }

    // suppression d'un film par son ID 
    public function delete(int $id)
    {
        try {
            $query = 'DELETE FROM movie WHERE id = :id';
            $params = [':id' => $id];
            $this->executeQuery($query, $params);
            return true;
        } catch (PDOException $e) {
           
            echo "Erreur lors de la suppression du film : " . $e->getMessage();
            return false;
        }
    }

    // récupérer  tous les films
    public function readAllMovie()
    {
        try {
            $query = 'SELECT * FROM movie';
            $stmt = $this->executeQuery($query, []);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des films : " . $e->getMessage();
            return false;
        }
    }

    // récupérer les 3 derniers film ajouté par l'admin

    public function readLastThreeMovies()
    {
        try {
            $query = 'SELECT * FROM movie ORDER BY created_at DESC LIMIT 3';
            $stmt = $this->executeQuery($query, []);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des films : " . $e->getMessage();
            return false;
        }
    }

    // récupérer les 3 films les plus aimer du site pour l'afficher sur la page home

    public function readMostLikedMovies() {
        try {
            $query = 'SELECT movie.*, COUNT(likes.id_movie) AS like_count FROM movie movie JOIN likes likes ON movie.id = likes.id_movie GROUP BY movie.id ORDER BY like_count DESC LIMIT 3;';
            $stmt = $this->executeQuery($query, []);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des films : " . $e->getMessage();
            return false;
            
        }
    }
    

}
