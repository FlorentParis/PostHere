<h1>Inscription</h1>
<?php
var_dump($_SESSION);
?>
<form action="sendregister" method="post">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="name">Prénom :</label>
        <input type="text" id="firstName" name="user_firstname">
    </div>
    <div>
        <label for="mail">E-mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="admin">Admin ?</label>
        <input type="hidden" class="admin" name="user_admin" value="0"/>
        <input type="checkbox" class="admin" name="user_admin" value="1">
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="user_pswd">
    </div>
    <div>
        <label for="vmdp">Verifier mot de passe :</label>
        <input type="password" id="vmdp" name="verif_pswd">
    </div>
    <button>S'inscrire</button>
</form>