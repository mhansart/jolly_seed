<div class="forum-container w-90">
    <h2>Forum</h2>
    <div>
        <button class="new-forum">Lancer une discussion</button>
        <form class="form-new-forum d-flex w-40" method="post">
            <label for="qust-forum">Titre de votre message:</label>
            <input type="text" name="qust-forum">
            <label for="text-forum">Votre message:</label>
            <textarea name="text-forum"></textarea>
            <button type="submit">Poster</button>
        </form>
    </div>
    <div>
        <?= $forum; ?>
    </div>
</div>