<section class="container-connexion w-80">
    <h2>Connexion</h2>
    <fieldset>
        <form method="post">
            <div class="nom">
                <label for="email">E-mail</label>
                <input type="text" placeholder="Entrer votre e-mail" name="email" class="input" id="email" required />
            </div>


            <div class="motdepasse">
                <label for="motdepasse">Mot de passe</label>
                <input type="text" placeholder="Entrer le mot de passe" name="mdp" class="input" id="motdepasse" required />
            </div>


            <div>
                <input type="checkbox" id="checkbox" class="input" name="checkbox" checked />
                <label for="checkbox">Se souvenir de moi</label>
            </div>
            <p><?= $errorConnexion; ?></p>

            <div>
                <button type="submit" id="bouton">Se connecter</button>
            </div><br/>

            <div><button type="reset">Effacer</button></div>
        </form>
    </fieldset>
    <a href id="forget-password">Mot de passe oublié ?</a>
</section>