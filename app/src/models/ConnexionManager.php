<?php

namespace App\models;

class ConnexionManager extends BaseManager
{
    public function userExist($email, $mdp)
    {
        $search = $this->pdo->prepare('SELECT * FROM users WHERE email = ? and password = ?');
        $search->execute(array($email, $mdp));
        return $search->fetch();
    }


}