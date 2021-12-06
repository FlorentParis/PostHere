<?php
namespace app\config\factories;

use PDO;

class PDOFactory{
    public static function getMysqlConnection(): PDO{
        return new PDO('mysql:host=db;dbname=posthere', 'root', 'example');
    }
}