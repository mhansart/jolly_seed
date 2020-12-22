<div class="search-container d-flex w-80">
    <div class="tri-search">
        <h3>Filtres</h3>
        <div>
            <p class="search-category">Les dons</p>
            <ul>
                <li>Graines / Semences / Noyaux</li>
                <li>Fleurs / Fruits / Légumes </li>
                <li>Terreau / Copeaux / Buches / Bois</li>
                <li>Plants / Arbustres / Arbres</li>
            </ul>
        </div>
        <div>
            <p class="search-category">Les Jardiniers</p>
            <ul>
                <li>Offre</li>
                <li>Demande</li>
            </ul>
        </div>
        <div>
            <p class="search-category">Les forums</p>
        </div>
    </div>
    <div class="result-search">
        <h2>Vous avez recherché "<?= $_SESSION["search-general"]; ?>"</h2>
        <?= $allSearch; ?>
    </div>
</div>
<script src="public/js/script_search.js"></script>