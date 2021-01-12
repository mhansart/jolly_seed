<?php
if (!isset($_SESSION['user_id'])) {
    echo '<div class="contact-container">';
};
?>
<section class="pageAccueil">
    <div class="photoAcc">
        <img src="public/image/partage.jpg" alt="deux paires de mains tenant un bol de tomates-cerises: symbole de partage" />
        <h2>Let's dare to share or care</h2>
    </div>
    <div class="textaccueil">
        <h2>Objectif de Jolly Seed</h2>
        <p>Ramener de la biodiversité en ville et inversement, prendre soin de l'environnement, créer des liens sociaux, partager des connaissances, s'alimenter plus sainement, local et de saison...et si vous testiez le co-jardinage ? Bienvenue sur le réseau social Jolly Seed ! Implanté à Bruxelles et dans le Brabant-Wallon, Jolly Seed n'aspire qu'à grandir </p>
        <h2>Description</h2>
        <p> Jolly Seed est une plateforme de communication entre personnes qui désirent donner des produits issus du jardin (<span class="vert">Les dons</span>) et d'autres qui désirent donner de leur temps ou en demander pour l'entretien ou la récolte (<span class="vert">Les jardiniers</span>).<br />
            Le site n'est pas un site commercial. </p>
        <h2>Comment l'application fonctionne-t-elle ? </h2>
        <p> Afin de pouvoir découvrir l'entiereté de ce site, une connexion sera nécessaire. Celle-ci vous permettra de pouvoir voir et réagir aux annonces. Des fruits à partager ? Trop de terre dans votre jardin ? Besoin d'un coup de main au jardin ou au contraire, vous en avez marre de la ville et vous désirez mettre les mains dans la terre et respirer l'air pur de la campagne? Ce site est fait pour vous!</p>
        <p>Vous aimez travailler dans votre jardin mais vous vous posez souvent des questions ou au contraire, vous avez de nombreux conseils à donner? La page <span class="vert">Forum</span> de Jolly Seed deviendra vite un outil indispensable!</p>
        <p><span class="vert">Mon compte</span> vous permettra de gérer au mieux vos annonces crées, vos annonces favorites ou vos contacts.
            <section class="carteTri">
                <h2>Annonces</h2>
                <p>Afin de faciliter les recherches, les annonces sont classées par catégories. A chaque catégorie sa couleur:</p>
                <ul>
                    <li><img class="logo" src="public/image/pomme-bleue.png" alt="logo bleu" />Graines / Semences / Noyaux</li>
                    <li><img class="logo" src="public/image/pomme-mauve.png" alt="logo mauve" />
                        Fleurs / Fruits / Légumes </li>
                    <li><img class="logo" src="public/image/pomme-bordeaux.png" alt="logo bordeaux" />
                        Terreau / Copeaux / Buches / Bois</li>
                    <li><img class="logo" src="public/image/pomme-jaune.png" alt="logo jaune" />
                        Plants / Arbustres / Arbres</li>
                    <li><img class="logo" src="public/image/pomme-rouge.png" alt="logo rouge" />
                        Temps offert ou demandé</li>
                </ul>
                <p> Vous voulez un petit aperçu géographique et thématique des annonces? Regardez! Puis n'hésitez plus, venez nous rejoindre !</p>
                <div class="contMap">
                    <div id="mapid"></div>
                </div>
            </section>
    </div>
</section>
<?php
if (!isset($_SESSION['user_id'])) {
    echo '</div>';
};
?>
<script type="module" src="public/js/script_accueil.js"></script>