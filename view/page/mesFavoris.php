<?php require_once("view/menu/menu_moncompte.php"); ?>

<div class="mesannonces-container w-80">
    <section class="pageDons ">
        <section class="centrePageDons">
            <div class="annonceDons">
                <?= $mesfavoris ?>
            </div>
            <div class="voir-plus-favoris">
                <button><a href="?section=dons">Voir plus de dons</a></button>
                <p>Besoin d'aide? Les jardiniers <a href="?section=jardiniers">ici</a>
            </div>
        </section>
    </section>
</div>





<script src="public/js/script_mesfavoris.js"></script>
<script src="public/js/script_moncompte.js"></script>