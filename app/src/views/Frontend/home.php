<div class="px-4">
    <?php foreach($posts as $post) { ?>

        <div class="border mb-2 p-2">
            <div>
                <div>
                    <span><?= $post->getTitle() ?></span>
                    <?= $userManager->getUserById($post->getAuthorId())->getFirstName(); ?>
                </div>
                <?= date('\L\e\ d/M/Y \à\ H:i:s.', strtotime($post->getCreatedAt())) ?>
            </div>
            <?= substr($post->getContent(), 0, rand(150, 200)) . '...' ?>
            <?php echo '<a href="post/'.$post->getId().'">Lien</a>'; ?>
        </div>

    <?php } ?>
</div>