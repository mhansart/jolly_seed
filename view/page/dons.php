<section class="pageDons">
        <section class="centrePageDons">
          <div class="d-flex row espace">
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
        <form action="/action_page.php" method="post">
         
          <h3>Catégorie:</h3>
          <input type="radio" id="seed" name="categorie" value="seed" />
          <label for="seed">Graines / Semis</label><br/>
          <input type="radio" id="flower" name="categorie" value="flower" />
          <label for="flower">Fleurs / Fruits / Légumes </label><br/>
          <input type="radio" id="ground" name="categorie" value="ground" />
          <label for="ground">Terreau / Copeaux / Buches / Bois</label><br/>
          <input type="radio" id="plant" name="categorie" value="plant" />
          <label for="plant">Plants / Arbustres / Arbres</label><br/>
          <input type="radio" id="time" name="categorie" value="time" />
          <label for="time">Temps donné / Temps offert</label><br/>
     
          <h3>Image: </h3>
          <div class="d-flex row">
            <div class='imageAnnonce'>
            </div>
            <div>
              <p>Afin d'illustrer vortre annonce, vous pouvez soit utiliser l'image ci-contre ou en télécharger une nouvelle.</p>
              <input type="file" class="message-texte" name="file"><br />
            </div>
          </div>
          <label for="titre"><h3>Titre:</h3></label>
          <input type="text" id="titre" name="titre" /><br />

          <label for="description"><h3>Description:</h3></label>
          <textarea id="description" name="description" rows="4" cols="50"> </textarea><br />

          <label for="contact"><h3>Contact:</h3></label>
          <p> Pour la prise de contact, je désire partager :</p>
          <div class="d-flex column">
            <input type="checkbox" id="contactNom" name="contactNom" value="nom">
            <label for="contactNom"> Nom de famille</label><br>
            <input type="checkbox" id="contactPrenom" name="contactPrenom" value="prenom">
            <label for="contactPrenom"> Prénom</label><br>
            <input type="checkbox" id="adresse mail" name="adresse mail" value="mail">
            <label for="adresse mail"> Adresse mail</label><br>        
            <input type="checkbox" id="noTel" name="noTel" value="tel">
            <label for="noTel"> Numéro de téléphone</label><br>
            <input type="checkbox" id="intro" name="intro" value="intro">
            <label for="intro"> Paragraphe d'introdution</label><br>
          </div>
          <p>Si toutes les cases sont décochées, les seul moyen de contact sera via le site.</p>
        


          <button><a href="#">Créer l'annonce</a></button>
        </form>




      </section>
      <script src="public/js/script_dons.js"></script>