<?php

namespace App\models;

use App\entity\User;

class UserManager extends BaseManager 
{
    public function getAllUser(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function getUserById(int $id): User
    {
        $search = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $search->execute(array($id));
        $search->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $user = $search->fetch();
        return $user;
    }

    public function deleteUser(int $id){
        $query = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        $query->execute(array($id));
        return $query;
    }
}