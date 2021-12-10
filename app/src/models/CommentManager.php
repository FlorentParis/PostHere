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

    public function getCommentById(int $id): Comment
    {
        $search = $this->pdo->prepare('SELECT * FROM commentaires WHERE id = ?');
        $search->execute(array($id));
        $search->setFetchMode(\PDO::FETCH_CLASS, Comment::class);
        $comment = $search->fetch();
        return $comment;
    }

    public function createComment(Comment $comment)
    {
        $values = array($comment->getContent(),$comment->getPostId(), $comment->getAuthorId());
        $result = $this->pdo->prepare("INSERT INTO `commentaires` (content, post_id, author_id) VALUES (?, ?, ?)");
        $result->execute($values);
    }

    public function updateComment(array $values)
    {
        $sql =  $this->pdo->prepare("UPDATE commentaires SET content=? WHERE id=?");
        $sql->execute($values);
    }

    public function deleteCommentById(int $id)
    {
        $query = $this->pdo->prepare('DELETE FROM commentaires WHERE id = ?');
        $query->execute(array($id));
    }
}