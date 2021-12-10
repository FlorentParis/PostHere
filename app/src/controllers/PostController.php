<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\entity\Comment;
use App\models\CommentManager;
use App\models\PostManager;
use App\models\UserManager;
use App\entity\Post;

class PostController extends BaseController
{
    public function executeShowPost()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($this->params['id']);
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $allComment = $commentManager->getAllComments($this->params['id']);
        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $this->render(
            'post.php',
            [
                'post' => $post,
                'userManager' => $userManager,
                'comments' => $allComment
            ],
            $post->getTitle()
        );
    }

    public function executeSendCreatePost()
    {
        if ( $_POST['title'] != null && $_POST['content'] != null ){
            $post = new Post();
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setAuthorId($_SESSION['user_actual']['id']);
            if(isset($_FILES['file'])){
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                move_uploaded_file($tmpName, './upload/'.$name);
            }
            $PostManager = new PostManager(PDOFactory::getMysqlConnection());
            $PostManager->createPost($post);
            header('Location: /');
        } else {
            header('Location: /createpost');
        }
    }

    public function executeCreatePost()
    {
        $this->render(
            'createPost.php',
            [],
            'Write Post'
        );
    }

    public function executeModifyPost(){
        header('Location: /');
    }

    public function executeDeletePost(){
        $post = new PostManager(PDOFactory::getMysqlConnection());
        $deletepost = $post->deletePostById($this->params['id']);
        header('Location: /');
    }
}