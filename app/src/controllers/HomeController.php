<?php
namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\ConnexionManager;
use App\models\PostManager;
use App\models\UserManager;

class HomeController extends BaseController{

    public function executeHome()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'userManager' => $userManager
            ],
            'Accueil'
        );
    }
}
