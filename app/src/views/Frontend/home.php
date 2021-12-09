<div>
    <?= $posts ?>
    <?php foreach($posts as $post) { ?>

        <div>
            <span><?= $post->getTitle() ?></span>
            <?php 
                echo $userManager->getUserById($post->getAuthorId());
            ?>
        </div>

    <?php } ?>
</div>