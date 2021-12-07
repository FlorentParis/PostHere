<?php

namespace App\models;

class ConnexionManager extends BaseManager
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function userExist($email, $mdp)
    {
        $search = $pdo->prepare('SELECT * FROM user WHERE email = {$email} and password = {$mdp}');
        return $search;
    }

    /*
    public function registerUser(){
        $insert = $pdo->prepare('INSERT INTO user VALUES('')')
    }*/
}