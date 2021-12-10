<?php

namespace App\entity;

class Post {
    private int $id;
    private string $title;
    private $image;
    private string $content;
    private string $author_id;
    private string $created_at; 

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): int
    {
        return $this->id = $id;
    }


    public function getTitle(){
        return $this->title;
    }

    public function setTitle(string $title): void{
        $this->title = $title;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image): void{
        $this->image = $image;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent(string $content): void{
        $this->content = $content;
    }

    public function getAuthorId(){
        return $this->author_id;
    }

    public function setAuthorId(string $author_id): void{
        $this->author_id = $author_id;
    }

    public function getCreatedAt(){
        return date($this->created_at);
    }

}