<?php require_once("view/menu/menu_moncompte.php"); ?>
<div class="chat-container w-80">
    <div>
        <div class="infos-interlocuteur d-flex">
            <div class="img-interlocuteur" style="background-image:url(<?= $imageInterlocuteur ?>)"></div>
            <div class="nom-interlocuteur"> <?= $nomInterlocuteur ?></div>
        </div>

        <?= $conversation ?>
    </div>
</div>

<!-- <h1>Hello !</h1>

<div id="messages"><?= $msg ?></div>

<form action="#" method="post" id="formcom">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">
    <label for="message">Message</label>
    <input type="text" name="message" id="message">
    <input type="submit" value="envoyer">
</form> -->



<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script src="public/js/script_chat.js"></script>
<script src="public/js/script_moncompte.js"></script>