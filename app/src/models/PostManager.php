<?php

namespace App\models;

use App\entity\Post;

class PostManager extends BaseManager
{
    public function getAllPosts(): array
    {
        $result = [];
        $posts = $this->pdo->prepare('SELECT * FROM posts');
        $posts->execute();
        foreach($posts as $post){
            $element = new Post();
            $element->setId($post['id']);
            $element->setTitle($post['title']);
            $element->setContent($post['content']);
            $element->setAuthorId($post['author_id']);
            array_push($result, $element);
        }
        return $result;
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