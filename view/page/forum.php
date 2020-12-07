<?php $recherche = isset($_SESSION['forum_recherche']) ? $_SESSION['forum_recherche'] : ""; ?>
<?php $retour = isset($_SESSION['forum_retour']) ? "?section=VoirPlusForum" : "?section=forum" ?>
<div class="forum-container w-80">
    <a class="retour-forum" href="<?= $retour; ?>"><i class="fas fa-chevron-left"></i> Page précédente</a>
    <h3 class="description-forum d-flex">
        <p class="w-50 description-search-forum">Vous avez une question? Recherchez dans les forums si vous trouvez ce que vous cherchez !</p>
        <p class="w-50"> Si vous ne trouvez pas ce que vous cherchez dans les discussions suivantes, lancez-en une !</p>
    </h3>
    <div class="d-flex new-forum-container">
        <div class="search-bar-forum d-flex w-50"><input class="ipt-search w-90" value="<?= $recherche; ?>" /><a href="?section=rechercheForum"><i class="fas fa-search"></i></a></div>
        <button class="new-forum w-50">Lancer une discussion</button>
        <form class="form-new-forum d-flex w-100" method="post">
            <i class="fas fa-times close-form-forum"></i>
            <label for="qust-forum">Titre de votre message:</label>
            <input type="text" name="qust-forum">
            <label for="text-forum">Votre message:</label>
            <textarea name="text-forum"></textarea>
            <label for="tag-forum">Entrez ici vos tags:</label>
            <input type="text" placeholder="Séparez-les par une virgule" name="tag-forum">
            <div><button type="submit">Poster</button></div>
        </form>
    </div>
    <div class="all-forum">
        <?= $forum; ?>
    </div>
</div>
<script src="public/js/script_forum.js"></script>
<?php unset($_SESSION['forum_recherche']); ?>
<?php unset($_SESSION['forum_retour']); ?>