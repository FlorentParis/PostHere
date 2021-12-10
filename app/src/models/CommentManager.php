<?php

namespace App\models;

use App\entity\Comment;
use App\entity\Post;

class CommentManager extends BaseManager
{
    public function getAllComments(int $post_id): array
    {
        $query = $this->pdo->prepare('SELECT * FROM commentaires WHERE post_id = ?');
        $query->execute(array($post_id));
        return $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function createComment(Comment $comment)
    {
        $values = array($comment->getContent(),$comment->getPostId(), $comment->getAuthorId());
        $result = $this->pdo->prepare("INSERT INTO `commentaires` (content, post_id, author_id) VALUES (?, ?, ?)");
        $result->execute($values);
    }

    public function updateComment(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    public function deleteCommentById(int $id)
    {
        $query = $this->pdo->prepare('DELETE FROM posts WHERE id = ?');
        $query->execute(array($id));
    }
}