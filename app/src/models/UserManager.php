<?php

namespace App\models;

use App\entity\User;

class UserManager extends BaseManager 
{
    public function addUser(User $user)
    {
        $values = array($user->getName(), $user->getFirstName(), $user->getEmail(), $user->getPassword(), $user->getAdmin());
        $sql = "INSERT INTO users(name, first_name, email, password, admin) VALUES (?, ?, ?, ?, ?)";
        $result = $this->pdo->prepare($sql);
        $result->execute($values);
    }

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

    public function deleteUserById(int $id){
        $query = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        $query->execute(array($id));
    }

    public function updateUser(array $data)
    {
        $sql = "UPDATE users SET name=?, first_name=?, email=?, password=?, admin=? WHERE id=?";
        $result = $this->pdo->prepare($sql);
        $result->execute($data);
        //TODO update value du user récup
    }
}