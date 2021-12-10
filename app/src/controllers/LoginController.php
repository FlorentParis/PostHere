<?php

namespace App\controllers;

use App\config\factories\PDOFactory;
use App\controllers\BaseController;
use App\models\ConnexionManager;

class LoginController extends BaseController
{
    public function executeSendlogin()
    {
        if ( isset($_POST['user_mail']) && isset($_POST['user_mdp']) ){
            $email = $_POST['user_mail'];
            $mdp = $_POST['user_mdp'];
            $connexion = new ConnexionManager(PDOFactory::getMysqlConnection());
            if ($connexion->userExist($email, $mdp)) {
                $_SESSION['user_actual'] = $connexion->userExist($email, $mdp);
                header('Location: /');
            } else {
                header('Location: /test');
            }
        } else {
            header('Location: /inscription');
        }
    }

    public function executeDisconnect()
    {
        //TODO clear param url
        unset($_SESSION['user_actual']);
        header('Location: /');
    }

    public function executeLogin()
    {
        $this->render(
            'Login.php',
            [],
            'Connexion'
        );
    }
}