<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\PostManager;
use App\models\UserManager;

class ApiController extends BaseController
{
    public function executeShowPosts()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $postsList = $postManager->getAllPosts();
        $posts = [];
        foreach($postsList as $post){
            $posts[] = (array) $post;
        }

        $this->render(
            'apiPosts.php',
            [
                'posts' => json_encode($posts)
            ],
            'Posts API'
        );
    }
}