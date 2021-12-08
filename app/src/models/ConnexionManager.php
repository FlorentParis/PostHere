<?php

namespace App\models;

class ConnexionManager extends BaseManager
{
    public function userExist($email, $mdp)
    {
        $search = $this->pdo->prepare('SELECT * FROM user WHERE email = {$email} and password = {$mdp}');
        return $search;
    }

    /*
    public function registerUser(){
        $insert = $pdo->prepare('INSERT INTO user VALUES('')')
    }*/
}