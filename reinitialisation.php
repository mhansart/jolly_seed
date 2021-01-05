<?php
session_start();
ob_start();
require_once("model/Connexion.php");
require_once("model/Personne.php");
unset($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["user_id"]);
session_destroy();

$u = new Personne();
$tabUsers = $u->readUser();
if (isset($_POST['mdp-perdu'])) {
    $passwordCrypte = password_hash($_POST['mdp-perdu'], PASSWORD_DEFAULT);
    $u->updateMdp($passwordCrypte, $_GET['iuse']);
    header("Location: http://localhost/jolly_seed/?section=connexion");
}
?>
<?php
require_once("view/html/head.php");
?>
<main>
    <div class="container-oubli d-flex">
        <form action="#" method="post" class="form-mdp-oubli-reinitialisation d-flex">
            <div class="h-100 logo-container">
                <a class="d-flex h-100" href="?section=accueil"><img src="public/image/logo.png" alt="Logo jolly seed" /></a>
            </div>
            <h3>Réinitialisation du mot de passe</h3>
            <label for="mdp-perdu">Rentrez votre nouveau mot de passe</label>
            <input type="text" name="mdp-perdu" id="mdp-perdu">
            <div class="btn-send-mail-mdp"><button type="submit">Réinitialiser</button></div>
        </form>
    </div>
</main>
<?php
require_once("view/html/footer.php");
?>