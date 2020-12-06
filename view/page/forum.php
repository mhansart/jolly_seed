<div class="forum-container w-80">
    <div class="d-flex">
        <button class="new-forum">Lancer une discussion</button>
        <form class="form-new-forum d-flex w-100" method="post">
            <label for="qust-forum">Titre de votre message:</label>
            <input type="text" name="qust-forum">
            <label for="text-forum">Votre message:</label>
            <textarea name="text-forum"></textarea>
            <label for="tag-forum">Entrez ici vos tags:</label>
            <input type="text" placeholder="Séparez-les par une virgule" name="tag-forum">
            <div><button type="submit">Poster</button></div>
        </form>
    </div>
    <div>
        <?= $forum; ?>
    </div>
</div>
<script src="public/js/script_forum.js"></script>