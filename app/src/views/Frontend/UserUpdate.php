<div class="container">
    <h1>Modification de <?= $user->getName()." ". $user->getFirstName()?></h1>
    <form action='/sendUpdate' method='post'>
    <input type="hidden" name="user_id" value="<?= $user->getId()?>">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="user_name" value="<?= $user->getName()?>">
        </div>
        <div>
            <label for="name">Prénom :</label>
            <input type="text" id="firstName" name="user_firstname" value="<?= $user->getFirstName()?>">
        </div>
        <div>
            <label for="mail">E-mail :</label>
            <input type="email" id="mail" name="user_mail" value="<?= $user->getEmail()?>">
        </div>
        <div>
            <label for="admin">Admin ?</label>
            <input type="hidden" class="admin" name="user_admin" value="0"/>
            <input type="checkbox" class="admin" name="user_admin" value="1" <?= ($user->getAdmin()== 1)?'checked':''?>>
        </div>
        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="user_pswd" value="<?= $user->getPassword()?>">
        </div>
        <div>
            <label for="vmdp">Verifier mot de passe :</label>
            <input type="password" id="vmdp" name="verif_pswd" value="<?= $user->getPassword()?>">
        </div>
        <button>Confirmer la modification</button>
    </form>
</div>
