<?php

namespace Movie\Controllers;

use Movie\Models\Like;

class LikeController
{
    private $likeModel;
    // intancie le models like

    public function __construct()
    {
        $this->likeModel = new Like();
    }
    // methode pour créer un like

    public function create($id_movie, $id_users)
    {
        $this->likeModel->create($id_movie, $id_users);
    }
    // methode pour lire un like

    public function read($id_users, $id_movie)
    {
        return $this->likeModel->readLikeByUserAndMovie($id_users, $id_movie);
    }
    // methode pour modifier un like
    public function update($id, $id_movie, $id_users)
    {
        $this->likeModel->update($id, $id_movie, $id_users);
    }

    // methode pour supprimer un like
    public function delete($id)
    {
        $this->likeModel->delete($id);
    }

    // methode qui permet de récupérer tous les films aimés par un utilisateur donné
    public function getAllByUserId($id_users)
    {
        return $this->likeModel->readAllLikeByUserId($id_users);
    }
}
