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

    public function addUser(array $data)
    {
        //var_dump($data);
        //var_dump($data);
        $sql = "INSERT INTO users(name, first_name, email, password, admin) VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."','".$data[4]."')";
        $result = $this->pdo->prepare($sql);
        $result->execute($data);
        //var_dump($result);
    }
}