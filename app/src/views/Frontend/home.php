<div>
    <?= $posts ?>
    <?php foreach($posts as $post) { ?>

        <div>
            <span><?= $post->getTitle() ?></span>
            <?php 
                var_dump($userManager->getUserById($post->getAuthorId()));
            ?>
        </div>

    <?php } ?>
</div>