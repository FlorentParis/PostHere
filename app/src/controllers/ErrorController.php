<?php
namespace App\controllers;

use App\controllers\BaseController;

class ErrorController extends BaseController{
    public function executeError404()
    {
        $this->render(
            '404.php',
            [],
            'Mauvaise Route'
        );
    }
}