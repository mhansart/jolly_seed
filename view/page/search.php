<div class="search-container d-flex w-80">
    <div class="tri-search">
        <h3 class="open-more-filtre"><span>Filtres</span><i class="fas fa-angle-down"></i></h3>
        <div class="tri-category-search">
            <p class="search-category">Voir tout</p>
        </div>
        <div class="tri-category-search">
            <p class="see-more-search"><span>Les dons</span><i class="fas fa-angle-down open-more"></i></p>
            <ul>
                <li class="search-category all-dons-research">Voir tous les dons</li>
                <li class="search-category research-seed">Graines / Semences / Noyaux</li>
                <li class="search-category research-flower">Fleurs / Fruits / Légumes </li>
                <li class="search-category research-ground">Terreau / Copeaux / Buches / Bois</li>
                <li class="search-category research-plant">Plants / Arbustres / Arbres</li>
            </ul>
        </div>
        <div class="tri-category-search">
            <p class="see-more-search"><span>Les Jardiniers</span><i class="fas fa-angle-down open-more"></i></p>
            <ul>
                <li class="search-category all-jardiniers-research">Voir tous les jardiniers</li>
                <li class="search-category research-offre">Offre</li>
                <li class="search-category research-demande">Demande</li>
            </ul>
        </div>
        <div class="tri-category-search">
            <p class="search-category">Les forums</p>
        </div>
    </div>
    <div class="result-search">
        <h2 class="word-research">Vous avez recherché "<?= $_SESSION["search-general"]; ?>"</h2>
        <h2 class="no-research-result" style="display:<?= $visibles; ?>">Malheureusement, votre recherche n'a donné aucun résultat</h2>
        <?= $allSearch; ?>
    </div>
</div>
<script src="public/js/script_search.js"></script>