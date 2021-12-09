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
        //TODO - SI API return $user_list en json
        $this->render(
            'UserList.php',
            [
                'user_list' => $user_list
            ],
            'LISTE'
        );
    }
}