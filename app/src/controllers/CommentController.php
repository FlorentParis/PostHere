<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\config\utils\Flash;
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
        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $comment = $commentManager->getCommentById($this->params['id']);

        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($comment->getPostId());

        $this->render(
            'CommentUpdate.php',
            [
                'post' => $post,
                'userManager' => $userManager,
                'comment' => $comment
            ],
            'Accueil'
        );
    }

    public function executeSendUpdate()
    {
        $content = $_POST['content'];
        $post_id = $_POST['post_id'];
        if(!empty($content)){
            $data = array($content, $post_id);
            $commmentUpdate = new CommentManager(PDOFactory::getMysqlConnection());
            $commmentUpdate->updateComment($data);
        }
        header("Location: /");

    }

    public function executeDeleteComment(){
        $comment = new CommentManager(PDOFactory::getMysqlConnection());
        $deletepost = $comment->deletePostById($this->params['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}