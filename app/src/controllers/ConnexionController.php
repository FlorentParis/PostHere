<?php
class ConnexionControlleur
{
    public function login()
    {
        if ( isset($_POST['email']) && isset($_POST['mdp']) ){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $connexion = new ConnexionManager();
            if ($connexion->userExist($email, $mdp)) {
                $_SESSION['user_actual'] = $connexion->userExist($email, $mdp);
                include 'app/views/espace_membre.php';
            } else {
                include 'app/views/authentification.php';
            }
        }
    }

    public function register()
    {
        
    }

    public function disconnect()
    {
        $_SESSION['user_actual'] = '';
    }
}