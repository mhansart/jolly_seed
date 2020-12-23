<?php require_once("view/menu/menu_moncompte.php"); ?>
<form action="#" method="post" enctype="multipart/form-data" class=" form-modif-picture-moncompte">
    <i class="fas fa-times close"></i>
    <h3>Modifier ma photo</h3>
    <label for="user-picture">Chargez une photo de profil</label>
    <input type="file" name="user-picture" id="user-picture">
    <input type='hidden' name='update-picture' value='<?= $_SESSION['user_id'] ?>'>
    <div class="btn-modif-img"><button type="submit">Modifier</button></div>
</form>
<div class="modif-infos-moncompte">
    <i class="fas fa-times close"></i>
    <form method="POST" id="formUpdate">
        <h3 class="titleContentUpdate" id="updateTitle">Modifier mes infos</h3>
        <div class="nom">
            <label>Nom:</label>
            <input type="text" name="nom" required value="<?= $nom ?>">
        </div>
        <div class="prenom">
            <label>Prénom:</label>
            <input type="text" name="prenom" required value="<?= $prenom ?>">
        </div>
        <div class="rue">
            <label for="rue">Rue:</label>
            <input type="text" placeholder="Rue" name="rue" class="input" id="rue" value="<?= $street ?>" required>
        </div>
        <div class="numero">
            <label for="numero">Numéro:</label>
            <input type="text" name="numero" class="input" id="numero" value="<?= $number ?>" required>
        </div>
        <div class="boite">
            <label for="boite">Boîte:</label>
            <input type="text" name="boite" class="input" value="<?= $box ?>" id="box">
        </div>
        <div class="codepostal">
            <label for="codepostal">Code postal:</label>
            <input type="text" name="codepostal" class="input" id="codepostal" value="<?= $citycode ?>" required>
        </div>


        <div class="ville">
            <label for="ville">Ville:</label>
            <input type="text" name="ville" class="input" id="ville" value="<?= $city ?>" required>
        </div>

        <div class="telephone">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" class="input" id="telephone" value="<?= $phone ?>" required>
        </div>
        <div class="email">
            <label>E-mail:</label>
            <input type="text" value="<?= $email ?>" name="email" required>
        </div>
        <div class="description">
            <label for="user-description">Description:</label>
            <textarea maxlength="200" type="text" name="user-description" id="user-description" value="<?= $description ?>"></textarea>
        </div>
        <input type='hidden' name='update' value='<?= $_SESSION['user_id'] ?>'>
        <button type="submit">Modifier</button>
    </form>
</div>
<div class="delete-infos-moncompte">
    <form action="#" method="POST">
        <i class="fas fa-times close"></i>
        <p>Êtes-vous sûr de vouloir supprimer votre compte?</p>
        <input type="hidden" name="delete" value="<?= $_SESSION['user_id'] ?>">
        <button class="oui-delete-mon-compte" type="submit">Oui</button>
    </form>
</div>
<div class="moncompte-container w-80">
    <div class="justify-space-between">
        <?= $infosUser ?>
    </div>

</div>
<script src="public/js/script_mesinfos.js"></script>
<script src="public/js/script_moncompte.js"></script>