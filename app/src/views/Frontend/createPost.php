<form action="sendcreatepost" method="post" enctype="multipart/form-data" class="p-4 m-4 border">
    <div class="d-flex flex-column">
        <label for="title">Title</label>
        <input type="text" name="title" class="w-25">
    </div>
    <div class="d-flex flex-column">
        <label for="picture">Image</label>
        <input type="file" name="picture">
    </div>
    <div>
        <label for="content">Contenu</label>
        <textarea name="content" class="w-100"></textarea>
    </div>
    <button>Envoyer</button>
</form>