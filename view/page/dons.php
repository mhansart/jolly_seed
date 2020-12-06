<section class="pageDons">
  <section class="centrePageDons">
    <div class="d-flex row enteteDons">
      <a href="#">Voir sur la carte</a>
      <button class="btnDons"><a href="#">Poster une annonce</a></button>
      <div class="tri">
        <p class="select">Trier par: <span class="choixTri">Date </span></p>
        <i class="fas fa-chevron-down"></i>
        <div class="options">
          <a id="date" class="opt" href="#">Date</a>
          <a id="categorie" class="opt" href="#">Catégorie</a>
          <a id="proximite" class="opt" href="#">Proximité</a>
        </div>
      </div>
    </div>
    <div class="annonceDons">
    <?=$dons?>
    <div>
  </section>
</section>
<section class="posterAnnonce box"> 
  <h2>Création d'annonce</h2>
  <form  method="post">
    <h3>Catégorie:</h3>
    <div class= "sectionCategorie">
      <div class="radio">
        <input type="radio" id="time" name="ads_category" value="time" />
        <label for="time">Temps demandé / Temps offert</label><br/>
        <input type="radio" id="seed" name="ads_category" value="seed" />
        <label for="seed">Graines / Semences / Noyaux</label><br/>
        <input type="radio" id="flower" name="ads_category" value="flower" checked/>
        <label for="flower">Fleurs / Fruits / Légumes </label><br/>
        <input type="radio" id="ground" name="ads_category" value="ground" />
        <label for="ground">Terreau / Copeaux / Buches / Bois</label><br/>
        <input type="radio" id="plant" name="ads_category" value="plant" />
        <label for="plant">Plants / Arbustres / Arbres</label><br/>
      </div>
      <div class="time">
        <input type="radio" id="demande" name="ads_titleSecondaire" value="Demande" />
        <label for="demande">Demande</label><br/>
        <input type="radio" id="offre" name="ads_titleSecondaire" value="Offre" />
        <label for="offre">Offre</label><br/>
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
      <div class='imageAnnonce'>
      </div>
      <div class="imageAlternative">
        <p>Afin d'illustrer vortre annonce, vous pouvez soit utiliser l'image ci-contre ou en télécharger une nouvelle.</p>
        <input type="file" class="message-texte" name="ads_picture"><br />
      </div>
    </div>
    <label class="titre" for="titre"><h3>Titre:</h3></label>
    <input class="titre" type="text" id="titre" name="ads_title" placeholder="nombre de char à fixer" value="Pas de titre"/><br />

    <label for="description"><h3>Description:</h3></label>
    <textarea id="description" name="ads_description" rows="4" cols="40"> </textarea><br />
<!--
    <label for="contact"><h3>Contact:</h3></label>
    <p> Pour la prise de contact, je désire partager :</p>
    <div class="left">
      <input type="checkbox" id="contactNom" name="contactNom" value="nom">
      <label for="contactNom"> Nom de famille</label><br/>
      <input type="checkbox" id="contactPrenom" name="contactPrenom" value="prenom">
      <label for="contactPrenom"> Prénom</label><br/>
      <input type="checkbox" id="photo" name="photo" value="mail">
      <label for="photo"> Photo personnelle</label><br/>  
      <input type="checkbox" id="adresse mail" name="adresse mail" value="mail">
      <label for="adresse mail"> Adresse mail</label><br/>        
      <input type="checkbox" id="noTel" name="noTel" value="tel">
      <label for="noTel"> Numéro de téléphone</label><br/>
      <input type="checkbox" id="intro" name="intro" value="intro">
      <label for="intro"> Paragraphe d'introdution</label><br/>
    </div>
    <p>Si toutes les cases sont décochées, le seul moyen de contact sera via le site.</p>-->
    <button class="creer" type="submit"><a href="#">Créer l'annonce</a></button>
  </form>
</section>
<script src="public/js/script_dons.js"></script>