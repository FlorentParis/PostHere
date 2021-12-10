<div class="m-4 border p-2">
    <div class="d-flex justify-content-between">
        <div>
            <h3><?= $post->getTitle() ?></h3>
            <div>
                <span><?= $userManager->getUserById($post->getAuthorId())->getFirstName(); ?></span>
                <span><?= date('\L\e\ d/M/Y \à\ H:i:s.', strtotime($post->getCreatedAt())) ?></span>
            </div>
        </div>

        <?php if($_SESSION['user_actual']['admin'] == 1 || $post->getAuthorId() == $_SESSION['user_actual']['id'] ){ ?>
            <div>
                <?= '<a href="modifpost/' . $post->getId() . '">'; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>
                <?= '<a href="/deletepost/' . $post->getId() . '">'; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash ms-2" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </a>
            </div>
        <?php } ?>
    </div>
    <div><?= $post->getContent() ?></div>
</div>
<?php if($_SESSION['user_actual']){?>
<div class="m-4 border p-2">
    <h3>Ecrire un commentaire</h3>
    <div class="d-flex justify-content-between">
        <form action="/sendcommentaire" method="post">
            <input type="hidden" name="post_id" value="<?= $post->getId()?>">
            <div>
                <label for="content">Votre commentaire</label>
                <textarea name="content" class="w-100"></textarea>
            </div>
            <button>Envoyer</button>
        </form>
    </div>
</div>
<?php }?>
<div class="px-4">
    <?php foreach($comments as $comment) { ?>
        <div class="border mb-2 p-2">
            <div>
                <div class="d-flex justify-content-between">
                    <?= $userManager->getUserById($post->getAuthorId())->getFirstName() .' a commenté '; ?>
                    <?= date('\L\e\ d/M/Y \à\ H:i:s.', strtotime($post->getCreatedAt())) ?>
                    <div>
                        <?= '<a href="modifcomment/' . $comment->getId() . '">'; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>s
                        </a>
                        <?= '<a href="/deletecomment/' . $comment->getId() . '">'; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash ms-2" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?= substr($comment->getContent(), 0, 255) ?>
        </div>
    <?php } ?>
</div>
