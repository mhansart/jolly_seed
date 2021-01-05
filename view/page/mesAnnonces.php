<?php require_once("view/menu/menu_moncompte.php"); ?>

<div class="mesannonces-container w-80">
    <section class="pageDons">
        <section class="centrePageDons">
            <div class="voir-plus-annonces d-flex">
                <button><a href="?section=dons">Poster un don</a></button>
                <button><a href="?section=jardiniers">Demander/offrir de l'aide</a></button>
            </div>
            <div class="annonceDons">
                <?= $mesdons ?>
            </div>
        </section>
    </section>
</div>






<script type="module" src="public/js/script_mesannonces.js"></script>
<script type="module" src="public/js/script_moncompte.js"></script>