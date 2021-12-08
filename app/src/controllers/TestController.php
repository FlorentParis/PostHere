<?php
namespace App\controllers;

use app\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\ConnexionManager;

class TestController extends BaseController{
    public function executeAccueil()
    {
        $this->render(
            'Accueil.php',
            [],
            'Accueil'
        );
    }
    public function executeTest1()
    {
        $this->render(
            'test1.php',
            [],
            'Test1'
        );
    }

    public function executeFoobar()
    {
        $manager = new ConnexionManager(PDOFactory::getMysqlConnection());
        $manager->userExist('foo', 'bar');
        header('Location: /');
    }
}
