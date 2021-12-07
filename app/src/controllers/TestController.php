<?php
namespace App\controllers;

use App\controllers\BaseController;

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
}
