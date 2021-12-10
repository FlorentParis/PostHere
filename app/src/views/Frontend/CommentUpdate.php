<div class="container">
    <h1>Modification d'un commentaire</h1>
    <div class="d-flex justify-content-between">
        <?= 'Commentaire de '.$userManager->getUserById($post->getAuthorId())->getFirstName(); ?>
        <?= date('\l\e\ d/M/Y \à\ H:i:s.', strtotime($post->getCreatedAt())) ?>
    </div>
    <?php echo "<form action='/sendupdatecomment' method='post'>"?>
        <input type="hidden" name="post_id" value="<?= $comment->getId()?>">
        <div>
            <label for="content">Votre commentaire</label>
            <textarea name="content" class="w-100"><?= $comment->getContent()?></textarea>
        </div>
        <button>Envoyer</button>
    </form>
</div>