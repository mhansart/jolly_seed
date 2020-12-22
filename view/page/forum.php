<?php $recherche = isset($_SESSION['forum_recherche']) ? $_SESSION['forum_recherche'] : ""; ?>
<?php $retour = isset($_SESSION['forum_retour']) ? "?section=VoirPlusForum" : "?section=forum" ?>
<div class="forum-container w-80">
    <a class="retour-forum" href="<?= $retour; ?>"><i class="fas fa-chevron-left"></i> Page précédente</a>
    <div class="d-flex new-forum-container">
        <div class="w-50 bloc-info-forum">
            <h3 class="description-search-forum">Vous avez une question? Recherchez dans les forums si vous trouvez ce que vous cherchez !</h3>
            <div class="search-bar-forum d-flex w-100"><input class="ipt-search w-90" value="<?= $recherche; ?>" /><i class="fas fa-search"></i></div>
        </div>
        <div id="forum-add-form" class="w-50 bloc-info-forum">
            <h3 id="info-add-forum"> Si vous ne trouvez pas ce que vous cherchez dans les discussions suivantes, lancez-en une !</h3>
            <button class="new-forum w-100">Lancer une discussion</button>
            <form class="form-new-forum d-flex w-100" method="post">
                <h3>Quelle est votre question?</h3>
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
    </div>
    <div class="all-forum">
        <h2 class="no-result-forum">Malheureusement, votre recherche n'a donné aucun résultat</h2>
        <?= $forum; ?>
    </div>
</div>
<script src="public/js/script_forum.js"></script>
<?php unset($_SESSION['forum_recherche']); ?>
<?php unset($_SESSION['forum_retour']); ?>