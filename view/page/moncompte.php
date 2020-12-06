<div class="moncompte-container w-90">
    <h2>Mon compte</h2>
    <?= $infosUser ?>
    <form action="#" method="post" enctype="multipart/form-data" class="d-flex">
        <label for="user-picture">Chargez une photo de profil</label>
        <input type="file" name="user-picture" id="user-picture">
        <input type="submit" value="Valider">
    </form>
    <form action="#" method="post" class="d-flex">
        <label for="user-description">Une petite description de vous pour les autres utilisateurs</label>
        <textarea type="text" name="user-description" id="user-description"></textarea>
        <input type="submit" value="Valider">
    </form>
</div>