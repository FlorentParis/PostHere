<?php
namespace App\controllers;

use App\controllers\BaseController;

class TestController extends BaseController{
    public function executeTest()
    {
        $this->render(
            'test.php',
            [],
            'Test'
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
