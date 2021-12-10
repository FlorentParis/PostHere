<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\entity\Comment;
use App\models\CommentManager;
use App\models\PostManager;
use App\models\UserManager;

class CommentController extends BaseController
{
    public function executeShowComments()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($this->params['id']);

        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $this->render(
            'post.php',
            [
                'post' => $post,
                'userManager' => $userManager
            ],
            $post->getTitle()
        );
    }

    public function executeCreateComment()
    {
        if ($_POST['content'] != null ){
            $comment = new Comment();
            $comment->setContent($_POST['content']);
            $comment->setPostId($_POST['post_id']);
            $comment->setAuthorId($_SESSION['user_actual']['id']);
            $CommentManager = new CommentManager(PDOFactory::getMysqlConnection());
            $CommentManager->createComment($comment);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function executeUpdateComment(){
        header('Location: /');
    }

    public function executeDeleteComment(){
        $post = new PostManager(PDOFactory::getMysqlConnection());
        $deletepost = $post->deletePostById($this->params['id']);
        header('Location: /');
    }
}