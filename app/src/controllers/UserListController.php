<?php

namespace App\controllers;

use App\config\factories\PDOFactory;
use App\config\utils\Flash;
use App\entity\User;
use App\models\ConnexionManager;
use App\models\UserManager;

class UserListController extends BaseController
{
    public function executeShowList()
    {
        if($_SESSION['user_actual']['admin'] == 1){
            $user = new UserManager(PDOFactory::getMysqlConnection());
            $user_list = $user->getAllUser();
            //var_dump($user_list);
            //TODO - SI API return $user_list en json
            $this->render(
                'UserList.php',
                [
                    'user_list' => $user_list
                ],
                'LISTE'
            );
        }else{
            $this->render(
                '404.php',
                [],
                'Erreur'
            );
        }
    }

    public function executeDeleteUser(){
        $user = new UserManager(PDOFactory::getMysqlConnection());
        $user->deleteUserById($this->params['id']);
        header('Location: /listuser');
    }

    public function executeUpdateUser(){
        $user = new UserManager(PDOFactory::getMysqlConnection());
        $user = $user->getUserById($this->params['id']);
        $this->render(
            'UserUpdate.php',
            ['user'=> $user],
            'Modification \'un utilisateur'
        );
    }

    public function executeSendUpdate()
    {
        $id = $_POST['user_id'];
        $name = $_POST['user_name'];
        $firstName = $_POST['user_firstname'];
        $email = $_POST['user_mail'];
        $admin = $_POST['user_admin'];
        $password = $_POST['user_pswd'];
        $verif_password = $_POST['verif_pswd'];
        if(!empty($name)&& !empty($firstName) && !empty($email) && !empty($password) && !empty($verif_password)){
            $data = [$name, $firstName, $email, $password, $admin, $id];
            if($password !== $verif_password){
                Flash::setFlash('alert', "Mot de passe diff");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else{
                $update = new UserManager(PDOFactory::getMysqlConnection());
                $update->updateUser($data);
                Flash::setFlash('success', "Modification réussite");
                header('Location: /listuser');
            }
        }else{
            Flash::setFlash('alert', "Veuillez bien remplir le formulaire");
            header('Location: /inscription');
        }
    }
}