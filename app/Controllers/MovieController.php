<?php

namespace Movie\Controllers;

use Movie\Models\Movie;

class MovieController
{
    private $movieModel;

    //  instancie le models Movie

    public function __construct()
    {
        $this->movieModel = new Movie();
    }

    // Méthode private pour valider les données du formulaire d'ajout d'un film
    private function validateInputMovie($data)
    {
        $errors = [];
        $title = $data['title'];
        $release_date = $data['release_date'];
        $actors_actresses = $data['actors_actresses'];
        $genre = $data['genre'];
        $duration = filter_var($data['duration'], FILTER_SANITIZE_NUMBER_INT); // pour s'assurer qu'il s'agit d'un entier
        $description = $data['description'];
        

        // si c'est vide
        if (empty($title)) {
            $errors[] = "Le titre est requis.";
        }

        if (empty($release_date)) {
            $errors[] = "La date de sortie est requise.";
        }

        if (empty($actors_actresses)) {
            $errors[] = "Les acteurs et actrices sont requis.";
        }

        if (empty($genre)) {
            $errors[] = "Le genre est requis.";
        }

        if (empty($duration)) {
            $errors[] = "La durée est requise.";
        }

        if (empty($description)) {
            $errors[] = "La description est requise.";
        }

        return [
            'title' => $title,
            'release_date' => $release_date,
            'actors_actresses' => $actors_actresses,
            'genre' => $genre,
            'duration' => $duration,
            'duration' => $duration,
            'description' => $description
        ];
    }

    // Méthode private pour gérer le téléchargement de l'image
    private function imageDownloadMovie($file)
    {
        
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $temporaryFileName = $file['tmp_name'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        if ($file['error'] === UPLOAD_ERR_OK && in_array($extension, $allowedExtensions)) {
            $uniqueName = uniqid() . '.' . $extension;
            $uploadDirectory = 'data/uploadsImgFilm/';
            $image_url = $uploadDirectory . $uniqueName;

            if (!move_uploaded_file($temporaryFileName, $image_url)) {
                $errors['message'] = "Erreur lors du téléchargement du fichier.";
                $errors['error'] = true;
                return $errors;
            }
        } else {
            $errors['message'] = "Erreur lors du téléchargement de l'image. Veuillez télécharger un fichier au format JPEG, JPG, ou PNG.";
            $errors['error'] = true;
            return $errors;
        }
        // Si $image_url est null, retourne une chaîne de caractères vide
        return $image_url ?? '';
    }

    // methode pour formater la durée pour quelle s'affiche bien en front

    private function formatDuration($movies)
    {
        foreach ($movies as &$movie) {
            // Convertit la durée en minutes en heures et minutes pour la durée
            $hours = floor($movie['duration'] / 60);
            $min = $movie['duration'] % 60;
            $durationFormatted = "{$hours}h{$min}m";
            $movie['duration'] = $durationFormatted;
        };

        return $movies;
    }




    // Méthode pour créer un film 
    public function createMovie($data, $file)
    {
        $errors = [];
        // j'inclue ma function validateInputMovie et ma function imageDownloadMovie
        $validatedFormMovie = $this->validateInputMovie($data);
        $image_url = $this->imageDownloadMovie($file);

        // Vérifie si l'utilisateur est un administrateur
        if (!isset($_SESSION['user']) && $_SESSION['user']['id_admin'] !== 1) {
            $errors[] = "Seul un administrateur peut ajouter un film.";
            return $errors;
        }

        if(isset($image_url['error'])) {
            // retourne une erreur
            return $image_url;
        }
        
        if (empty($errors)) {
            $this->movieModel->create(
                $validatedFormMovie['title'],
                $validatedFormMovie['release_date'],
                $validatedFormMovie['actors_actresses'],
                $validatedFormMovie['genre'],
                $validatedFormMovie['duration'],
                $image_url,
                $validatedFormMovie['description']
            );

            $_SESSION['message'] = "Le film a été ajouté avec succès!";
            // si il n'y a pas d"erreur ca retourne true 
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            // si il y a des erreurs ca retourne false
            return false;
        }
    }

    // Méthode pour mettre à jour un film
    public function updateMovie($id, $data, $file)
    {
        $errors = [];

        $validatedData = $this->validateInputMovie($data);
        $image_url = $this->imageDownloadMovie($file);

        // Vérifie si l'utilisateur est un administrateur
        if (!isset($_SESSION['user']) && $_SESSION['user']['id_admin'] !== 1) {
            $errors[] = "Seul un administrateur peut ajouter un film.";
            return $errors;
        }

        if (isset($image_url['error'])) {
            // retourne une erreur
            return $image_url;
        }

        if (empty($errors)) {
            $this->movieModel->update(
                $id,
                $validatedData['title'],
                $validatedData['release_date'],
                $validatedData['actors_actresses'],
                $validatedData['genre'],
                $validatedData['duration'],
                $image_url,
                $validatedData['description']
            );

            $_SESSION['message'] = "Le film a été mis à jour avec succès!";
            return true;
        } else {
            $_SESSION['errors'] = $errors;
            return false;
        }
    }

    // Méthode pour récupérer un film par son ID
    public function getMovieById($id, $getForUpdate = false)
    {
        if ($getForUpdate) {
            return $this->movieModel->read($id);
        }

        $movieGet = array();
        $movieGet[] = $this->movieModel->read($id);
        [$movie] = $this->formatDuration($movieGet);
        return $movie;
    }

    // Méthode pour supprimer un film
    public function deleteMovie($id)
    {
        $this->movieModel->delete($id);
    }

    // Méthode pour récupérer tous les films
    public function getAllMovies()
    {
        $moviesGet = $this->movieModel->readAllMovie();
        // recuperer la functions pour le format de durée
        $movies = $this->formatDuration($moviesGet);
        
        return $movies;
    }

    // methode pour récupérer les 3 derniers film ajouté
    public function getThreeMovies()
    {
        $lastMovieGet = $this->movieModel->readLastThreeMovies();
        $movies = $this->formatDuration($lastMovieGet);
        return $movies;
    }

    // methode pour récupérer les 3 films les plus aimé

    public function getMostLikedMovies()
    {
        $moviesGet = $this->movieModel->readMostLikedMovies();
        $likedMovies = $this->formatDuration($moviesGet);
        return $likedMovies;
    }
}
