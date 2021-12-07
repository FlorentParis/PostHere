<?php

namespace App\controllers;

class RegisterController extends BaseController
{
    public function executeRegister()
    {
        $this->render(
            'Register.php',
            [],
            'Inscription'
        );
    }
}