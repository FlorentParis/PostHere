<?php

namespace App\entity;

class User {
    private int $id;
    private string $name;
    private string $first_name;
    private string $email;
    private string $password;
    private bool $admin;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): int
    {
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void{
        $this->first_name = $first_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }

    public function getAdmin(){
        return $this->admin;
    }

    public function setAdmin(string $admin): void{
        $this->admin = $admin;
    }
}