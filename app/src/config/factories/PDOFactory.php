<?php
namespace app\src\config\factories;

use PDO;

class PDOFactory{
    public static function getMysqlConnection(){
        return new PDO('mysql:host=localhost;dbname=posthere', 'root', 'example');
    }
}
