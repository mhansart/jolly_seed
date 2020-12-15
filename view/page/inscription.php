<section class="container-inscription w-80">
    <h2>Inscription</h2>
    <fieldset>
        <form method="post">
            <div class="prenom">
                <label for="prenom">Prénom:</label>
                <input type="text" placeholder="Prénom" name="prenom" class="input" id="prenom" required>
            </div>

            <div class="nom">
                <label for="nom">Nom:</label>
                <input type="text" placeholder="Nom de famille" name="nom" class="input" id="nom" required>
            </div>

            <div class="email">
                <label for="email">E-mail:</label>
                <input type="text" placeholder="E-mail" name="email" class="input" id="email" required>
            </div>

            <div class="rue">
                <label for="rue">Rue:</label>
                <input type="text" placeholder="Rue" name="rue" class="input" id="rue" required>
            </div>

            <div class="numero">
                <label for="numero">Numéro:</label>
                <input type="text" placeholder="Numéro" name="numero" class="input" id="numero" required>
            </div>
            <div class="boite">
                <label for="boite">Boîte:</label>
                <input type="text" placeholder="Boîte" name="boite" class="input" id="box">
            </div>

            <div class="codepostal">
                <label for="codepostal">Code postal:</label>
                <input type="text" placeholder="Code Postal" name="codepostal" class="input" id="codepostal" required>
            </div>


            <div class="ville">
                <label for="ville">Ville:</label>
                <input type="text" placeholder="Ville" name="ville" class="input" id="ville" required>
            </div>

            <div class="motdepasse">
                <label for="motdepasse">Mot de passe:</label>
                <input type="password" placeholder="Mot de passe" name="mdp" class="input" id="mdp" required>
            </div>

            <div class="telephone">
                <label for="telephone">Téléphone:</label>
                <input type="text" placeholder="Téléphone fixe ou mobile" name="telephone" class="input" id="telephone" required>
            </div>

            <div>
                <input type="checkbox" id="checkbox" name="checkbox" checked>
                <label for="checkbox">J'accepte les conditions générales</label>
            </div>
            <p><?= $msgInscription ?></p>

            <div><button type="submit" id="bouton">S'inscrire</button></div><br>
            <div><button type="reset">Effacer</button></div>
        </form>
    </fieldset>
</section>