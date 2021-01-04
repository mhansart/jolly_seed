<?php require_once("view/menu/menu_moncompte.php"); ?>
<div class="chat-container w-80">
    <div>
        <div class="infos-interlocuteur d-flex">
            <div class="img-interlocuteur" style="background-image:url(<?= $imageInterlocuteur ?>)"></div>
            <div class="nom-interlocuteur"> <?= $nomInterlocuteur ?></div>
        </div>
        <div class="msgs-chat">

            <?= $conversation ?>
        </div>
    </div>

    <script type="module" src="public/js/script_chat.js"></script>
    <script src="public/js/script_moncompte.js"></script>