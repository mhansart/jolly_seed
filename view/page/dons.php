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
  <h2>Création d'annonce de don</h2>
  <form enctype="multipart/form-data" method="post" >
    <h3>Catégorie:</h3>
    <div class= "sectionCategorie">
      <div class="radio">
        <input type="radio" id="seed" name="ads_category" value="seed" checked/>
        <label class="DonOptionRadio" for="seed">Graines / Semences / Noyaux</label><br/>
        <input type="radio" id="flower" name="ads_category" value="flower"/>
        <label class="DonOptionRadio" for="flower">Fleurs / Fruits / Légumes </label><br/>
        <input type="radio" id="ground" name="ads_category" value="ground" />
        <label class="DonOptionRadio" for="ground">Terreau / Copeaux / Buches / Bois</label><br/>
        <input type="radio" id="plant" name="ads_category" value="plant" />
        <label class="DonOptionRadio" for="plant">Plants / Arbustres / Arbres</label><br/>
      </div>
    </div>
    <h3>Image: </h3>
    <div class="sectionCategorie annonceImage">
      <div class="conteneurImageAnnonce">
        <div class='imageAnnonce'>
        </div>
        <div class="imageAlternative">
          <p>Afin d'illustrer vortre annonce, vous pouvez soit utiliser l'image ci-contre ou en télécharger une nouvelle.</p>
          <input type="file" class="fichierImage" name="ads_picture" value="Pas d'image"><br />
        </div>
      </div>
    </div>
    <h3>Titre: </h3>
    <label class="donTitre" for="donTitre">Titre à remplir:</label><br/>
    <input class="donTitre" type="text" id="donTitre" name="ads_title" placeholder="nombre de char à fixer" value="Pas de donTitre"/><br />
    <h3>Description:</h3>
    <label for="description"><p>Descriptif du don proposé:</p></label>
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
    <button class="creer" type="submit">Créer l'annonce</button>
  </form>
</section>
<script src="public/js/script_dons.js"></script>