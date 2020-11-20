<h2>Ajouter une personne</h2>
<form action="#" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom"><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom"><br>

    <p>Sexe : 
    <input type="radio" name="sexe" id="sexe" value="M">
    <label for="M">M</label>
    <input type="radio" name="sexe" id="sexe" value="F">
    <label for="F">F</label></p>   

    <label for="ad_rue">Rue :</label>
    <input type="text" name="ad_rue" id="ad_rue"><br>

    <label for="ad_num">Numéro :</label>
    <input type="text" name="ad_num" id="ad_num"><br>

    <label for="ad_cp">Code postal :</label>
    <input type="number" name="ad_cp" id="ad_cp" min="1000" max="9999"><br>

    <label for="ad_ville">Ville :</label>
    <input type="text" name="ad_ville" id="ad_ville"><br>

    <input type="submit" value="Ajouter">

</form>