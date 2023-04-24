<?php

namespace Movie\Controllers;

use Movie\Controllers\LikeController;
use Movie\Models\Movie;

class MovieController
{
    private $likeController;
    private $movieModel;

    //  instancie le models Movie

    public function __construct()
    {
        $this->likeController = new LikeController();
        $this->movieModel = new Movie();
    }

    // Méthode private pour valider les données du formulaire d'ajout d'un film
    private function validateInputMovie($data)
    {
        $errors = [];
        $title = htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8');
        $release_date = htmlspecialchars($data['release_date'], ENT_QUOTES, 'UTF-8');
        $actors_actresses = htmlspecialchars($data['actors_actresses'], ENT_QUOTES, 'UTF-8');
        $genre = htmlspecialchars($data['genre'],ENT_QUOTES, 'UTF-8');
        $duration = filter_var(htmlspecialchars($data['duration']), FILTER_SANITIZE_NUMBER_INT); // pour s'assurer qu'il s'agit d'un entier
        $description = htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8');

        // si c'est vide ou null
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

    // savoir quelle film a était liké par un utilisateur si il est connecté
    private function manageMovieLiked($movies)
    {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];

            // Pour chaque film, on vérifie si l'utilisateur a aimé le film
            foreach ($movies as &$movie) {
                $movie_id = $movie['id'];
                $like = $this->likeController->read($user_id, $movie_id);
                $movie['like_by_user'] = !empty($like);
            }

            return $movies;
        } else {
            return $movies;
        }
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

        if (isset($image_url['error'])) {
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
                htmlspecialchars($validatedData['title'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($validatedData['release_date'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($validatedData['actors_actresses'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($validatedData['genre'], ENT_QUOTES, 'UTF-8'),
                filter_var($validatedData['duration'], FILTER_SANITIZE_NUMBER_INT),
                htmlspecialchars($image_url), ENT_QUOTES, 'UTF-8',
                htmlspecialchars($validatedData['description'], ENT_QUOTES, 'UTF-8')
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
        $moviesWithDuration = $this->formatDuration($moviesGet);

        $movies = $this->manageMovieLiked($moviesWithDuration);

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
