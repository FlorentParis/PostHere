<?php

namespace App\models;

use App\entity\Post;

class PostManager extends BaseManager
{
    public function getAllPosts(): array
    {
        $search = $this->pdo->prepare('SELECT * FROM posts');
        $search->execute();
        return $search->fetchAll();
    }

    public function getPostById(int $id): Post
    {
        // TODO - Posts by Id
    }

    public function createPost(Post $post)
    {
        // TODO - create post
        return true;
    }

    public function updatePost(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    public function deletePostById(int $id): bool
    {
        // TODO - Delete post
    }
}