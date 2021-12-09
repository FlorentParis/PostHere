<?php

namespace App\models;

use App\entity\Post;

class PostManager extends BaseManager
{
    public function getAllPosts(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM posts');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Post::class);
    }

    public function getPostById(int $id): Post
    {
        $search = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
        $search->execute(array($id));
        $search->setFetchMode(\PDO::FETCH_CLASS, Post::class);
        $post = $search->fetch();
        return $post;
    }

    public function createPost(Post $post)
    {
        $result = $this->pdo->prepare("INSERT INTO `posts` (title, content, author_id) VALUES (".$post->getTitle().",".$post->getContent().",".$post->getAuthorId().")");
        $result->execute();
    }

    public function updatePost(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    public function deletePostById(int $id)
    {
        $query = $this->pdo->prepare('DELETE FROM posts WHERE id = ?');
        $query->execute(array($id));
    }
}