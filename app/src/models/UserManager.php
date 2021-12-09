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
        $user = new User();
        $user->setId($search['id']);
        $user->setName($search['name']);
        $user->setFirstName($search['first_name']);
        $user->setEmail($search['email']);
        $user->setPassword($search['password']);
        $user->setAdmin($search['admin']);
        return $user;
    }
}