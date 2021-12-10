<?php

namespace App\entity;

class Comment {
    private int $id;
    private string $content;
    private string $author_id;
    private string $post_id;

    /**
     * @return string
     */
    public function getPostId(): string
    {
        return $this->post_id;
    }

    /**
     * @param string $post_id
     */
    public function setPostId(string $post_id): void
    {
        $this->post_id = $post_id;
    }

    private string $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): int
    {
        return $this->id = $id;
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