<section class="pageDons">
  <section class="centrePageDons">
    <div class="d-flex enteteDons">
      <button class=btnCarte>Voir sur la carte</button>
      <button class="btnDons">Poster une annonce</button>
      <div class="tri">
        <p class="select">Trier par: <span class="choixTri">Date </span>
          <span class="chevron"><i class="fas fa-chevron-down"></i></span></p>
        <div class="options">
          <div id="date" class="opt">Date</div>
          <div id="categorie" class="opt">Catégorie</div>
          <div class="sous-options">
            <p class="ssopt seedOpt">Graines / Semences / Noyaux</p>
            <p class="ssopt flowerOpt">Fleurs / Fruits / Légumes </p>
            <p class="ssopt groundOpt">Terreau / Copeaux / Buches / Bois</p>
            <p class="ssopt plantOpt">Plants / Arbustres / Arbres</p>
          </div>
        </div>
      </div>
    </div>
    <div class="annonceDons">
      <?= $dons ?>
      <div>
  </section>
  <section class="posterAnnonce box">
    <button class="sortir"><i class="fas fa-times"></i></button>
    <h2>Création d'annonce de don</h2>
    <form enctype="multipart/form-data" method="post">
      <h3>Catégorie:</h3>
      <div class="sectionCategorie">
        <div class="radio">
          <input type="radio" id="seed" name="ads_category" value="seed" checked />
          <label class="DonOptionRadio" for="seed">Graines / Semences / Noyaux</label><br />
          <input type="radio" id="flower" name="ads_category" value="flower" />
          <label class="DonOptionRadio" for="flower">Fleurs / Fruits / Légumes </label><br />
          <input type="radio" id="ground" name="ads_category" value="ground" />
          <label class="DonOptionRadio" for="ground">Terreau / Copeaux / Buches / Bois</label><br />
          <input type="radio" id="plant" name="ads_category" value="plant" />
          <label class="DonOptionRadio" for="plant">Plants / Arbustres / Arbres</label><br />
        </div>
      </div>
      <h3>Image: </h3>
      <div class="sectionCategorie annonceImage">
        <div class="conteneurImageAnnonce">
          <div class='imageAnnonce'>
          </div>
          <div class="imageAlternative">
            <p>Afin d'illustrer vortre annonce, vous pouvez soit utiliser l'image ci-contre ou en télécharger une nouvelle.</p>
            <input type="file" class="fichierImage" name="ads_picture" value="Pas d'image"><br /><br />
            <input class="futurId" type="hidden" value="<?= $futurAdsId ?>">
          </div>
        </div>
      </div>
      <h3>Titre: </h3>
      <input class="donTitre" type="text" id="donTitre" name="ads_title" placeholder="Titre" value="" /><br />
      <h3>Description:</h3>
      <textarea id="description" name="ads_description" placeholder="Maximum 200 caractères" rows="5" maxlength="200"></textarea><br />
      <button class="creer" type="submit">Créer l'annonce</button>
    </form>
  </section>
</section>
<script type="module" src="public/js/script_dons.js"></script>