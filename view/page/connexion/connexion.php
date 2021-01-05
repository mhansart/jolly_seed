<form action="#" method="post" class="form-mdp-oubli">
    <i class="fas fa-times close"></i>
    <h3>Mot de passe oublié?</h3>
    <label for="mdp-perdu">Rentrez votre adresse mail pour modifier votre mot de passe</label>
    <input type="text" name="mdp-perdu" id="mdp-perdu">
    <div class="btn-send-mail-mdp"><button type="submit">Envoyer un e-mail</button></div>
    <span style="color:<?= $colorEtat; ?>"><?= $etat; ?></span>
</form>
<section class="container-connexion w-80">
    <div class="picture-connexion connexion-page w-50"></div>
    <div class="content-connexion w-50">
        <h3>Connexion</h3>
        <form method="post">
            <div class="nom-connexion">
                <label for="email">E-mail</label>
                <input type="text" placeholder="Entrez votre e-mail" name="email" class="input" id="email" required />
            </div>

            <div class="motdepasse-connexion">
                <label for="motdepasse">Mot de passe</label>
                <input type="password" placeholder="Entrez votre mot de passe" name="mdp" class="input" id="motdepasse" required />
            </div>
            <span class="bold" style="color:red"><?= $errorConnexion; ?></span>

            <div class="btns-connexion"><button type="submit" id="bouton">Se connecter</button><button type="reset" class="effacer-connexion">Effacer</button></div>
        </form>
        <p class="fin-connexion"><span>Pas encore de compte? </span><a href="?section=inscription"><span class="bold"> Inscrivez-vous</a></p>
        <p class="mdp-oubli">Mot de passe oublié?</p>
    </div>
</section>
<script src="public/js/script_connexion.js"></script>