<div class="container">
    <h1>Liste des utilisateurs</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $compteur = 1;
        foreach ($user_list as $user):?>
            <tr>
                <th scope="row"><?= $compteur?></th>
                <td><?= $user->getName()?></td>
                <td><?= $user->getFirstName()?></td>
                <td><?= $user->getEmail()?></td>
            </tr>
        <?php $compteur++;
        endforeach;?>
        </tbody>
    </table>
</div>
