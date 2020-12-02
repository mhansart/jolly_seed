<?php
$errorConnexion = "";
$p = new Personne();

if (isset($_POST["email"], $_POST["mdp"])) {
    if ($_POST["email"] !== "" && $_POST["mdp"] !== "") {
        $tabUsers = $p->readConnexion($_POST['email']);
        $dbmdp = $tabUsers[0]['user_mdp'];

        if (password_verify($_POST['mdp'], $dbmdp)) {
            $_SESSION['user_id'] = $tabUsers[0]['user_id'];
            $_SESSION['prenom'] = $tabUsers[0]['user_firstname'];
            header("Location:?section=accueil");
        } else {
            $errorConnexion = "Le mot de passe ou l'e-mail est incorrect";
        }
    }
}

require_once("view/page/connexion/connexion.php");
