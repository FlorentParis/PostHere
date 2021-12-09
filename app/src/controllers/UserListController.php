<?php

namespace App\controllers;

use App\config\factories\PDOFactory;
use App\entity\User;
use App\models\UserManager;

class UserListController extends BaseController
{

    public function executeShowList()
    {
        $user_list = new UserManager(PDOFactory::getMysqlConnection());
        $user_list = $user_list->getAllUser();
        //var_dump($user_list);
        //TODO - SI API return $user_list en json
        $this->render(
            'UserList.php',
            [
                'user_list' => $user_list
            ],
            'LISTE'
        );
    }

    public function executeDeleteUser(){
        $user = new UserManager(PDOFactory::getMysqlConnection());
        $deleteuser = $user->deleteUser($this->params['id']);
        header('Location: /listuser');
    }
}