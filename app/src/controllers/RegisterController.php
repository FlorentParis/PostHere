<?php

namespace App\controllers;

use App\config\factories\PDOFactory;
use App\config\utils\Flash;
use App\models\ConnexionManager;

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

    public function executeSendForm(){
        $name = $_POST['user_name'];
        $firstName = $_POST['user_firstname'];
        $email = $_POST['user_mail'];
        isset($_POST['user_admin'])?$admin = true : $admin = false;
        $password = $_POST['user_pswd'];
        $verif_password = $_POST['verif_pswd'];

        if(!empty($name)&& !empty($firstName) && !empty($email) && !empty($password) && !empty($verif_password)){
            $data = [$name, $firstName, $email, $password, $admin];
            if($password !== $verif_password){
                Flash::setFlash('alert', "Mot de passe diff");
                header('Location: /inscription');
            }else{
                $connexion = new ConnexionManager(PDOFactory::getMysqlConnection());
                $connexion->addUser($data);
                Flash::setFlash('success', "Inscription success");
                header('Location: /');
            }

        }else{
            Flash::setFlash('alert', "Veuillez bien remplir le formulaire");
            header('Location: /inscription');
        }

    }
}