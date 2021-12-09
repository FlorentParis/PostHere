<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\PostManager;
use App\models\UserManager;

class PostController extends BaseController
{
    public function executeShowPost()
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
}