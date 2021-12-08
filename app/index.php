<?php

session_start();
require './vendor/autoload.php';

//echo \App\controllers\BaseController::test();
$router = new \App\config\routes\Router();
$router->getController();
?>
Index