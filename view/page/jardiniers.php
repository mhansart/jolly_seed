<section class="pageDons">
  <section class="centrePageDons">
    <div class="d-flex row enteteDons">
      <button class=btnCarte>Voir sur la carte</button>
      <button class="btnDons">Poster une annonce</button>
      <div class="tri">
        <p class="select">Trier par: <span class="choixTri">Date </span></p>
        <span class="chevron"><i class="fas fa-chevron-down"></i></span>
        <div class="options">
          <div id="date" class="opt">Date</div>
          <div id="categorie" class="opt">Catégorie</div>
          <div class="sous-options">
            <p class="ssopt tmpsDoOpt">Temps demandé</p>
            <p class="ssopt tmpsOffOpt">Temps offert</p>
          </div>
        </div>
      </div>
    </div>
    <div class="annonceDons">
    <?=$dons?>
    <div>
  </section>
  <section class="posterAnnonce box">
  <button class="sortir"><i class="fas fa-times"></i></button>
    <h2>Création d'annonce</h2>
    <form enctype="multipart/form-data" method="post" >
      <h3>Catégorie:</h3>
      <div class= "sectionCategorie">
        <div class="time">
          <input type="radio" id="demande" name="ads_titleSecondaire" value="Demande" />
          <label for="demande">Temps demandé</label><br/>
          <input type="radio" id="offre" name="ads_titleSecondaire" value="Offre" />
          <label for="offre">Temps offert</label><br/>
          <div class="timeSlot">
            <input type="radio" id="demiJournee" name="ads_time" value="demiJournee" />
            <label for="demiJournee">Une demi-journée</label><br/>
            <input type="radio" id="journee" name="ads_time" value="journee" />
            <label for="journee">Une journee</label><br/>
            <input type="radio" id="plus" name="ads_time" value="plus" />
            <label for="plus">Plus d'une journée</label><br/>
          </div>
        </div>
      </div>
      <h3>Image: </h3>
      <div class="sectionCategorie annonceImage">
        <div class="conteneurImageAnnonce">
          <div class='imageAnnonce' style='background-image: url("../jolly_seed/uploads/<?=$annoncePicture?>");'>
            <div class='imageAnnonceFixe'>
            </div>
          </div>
          <div class="imageAlternative">
            <input class="inputAccord" type="checkbox" id="photoPerso" name="photoPerso" checked />
            <label class="accord" for="plus">Je donne mon accord pour publier ma photo</label><br/>
          </div>
        </div>
      </div>
      
      <h3>Description:</h3>
      <textarea id="description" name="ads_description" rows="4" cols="40"> </textarea><br />
      <button class="creer" type="submit">Créer l'annonce</button>
    </form>
  </section>
</section>
<script src="public/js/script_jardiniers.js"></script>