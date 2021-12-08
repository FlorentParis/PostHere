<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\ConnexionManager;
use App\models\PostManager;

class HomeController extends BaseController{

    public function executeHome()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $this->render(
            'home.php',
            [
                'posts' => $posts
            ],
            'Accueil'
        );
    }
}
