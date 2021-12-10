<?php

session_start();
require './vendor/autoload.php';

//echo \App\controllers\BaseController::test();
$router = new \App\config\routes\Router();
$router->getController();

//TODO sécuriser auth token
//TODO crypter le mot de passe
//TODO POST : Faire formulaire de création, modification, suppression
//TODO COMMENTAIRE : Afficher les commentaires de chaque post, modification, suppression
//TODO API : transfer des données en json dans une autre route

//TODO réflechir a comment séparer le front et le back
?>
Index