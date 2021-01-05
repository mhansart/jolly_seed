<?php
$errorConnexion = "";
$etat = "";
$colorEtat = "";
$p = new Personne();
if (isset($_POST["email"], $_POST["mdp"])) {
    if ($_POST["email"] !== "" && $_POST["mdp"] !== "") {
        $tabUsers = $p->readConnexion($_POST['email']);
        if (!empty($tabUsers)) {


            $dbmdp = $tabUsers[0]['user_mdp'];
            if (password_verify($_POST['mdp'], $dbmdp)) {
                $_SESSION['user_id'] = $tabUsers[0]['user_id'];
                $_SESSION['prenom'] = $tabUsers[0]['user_firstname'];
                $_SESSION['user_city'] = $tabUsers[0]['user_city'];
                header("Location:?section=accueil");
            } else {
                $errorConnexion = "Le mot de passe ou l'e-mail est incorrect";
            }
        } else {
            $errorConnexion = "Le mot de passe ou l'e-mail est incorrect";
        }
    }
}
if (isset($_POST['mdp-perdu'])) {
    $u = new Personne();
    $tabUser = $u->readConnexion($_POST['mdp-perdu']);
    if (!empty($tabUser)) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: info.jollyseed@gmail.com ' . "\r\n";
        $dest = $_POST['mdp-perdu'];
        $sujet = "Réinitialisation de votre mot de passe";
        $corp = '<h1>Réinitialisation de votre mot de passe</h1>
  <p>Bonjour, voici un nouveau lien pour réinitaliser votre mot de passe : <a href="http://localhost/jolly_seed/reinitialisation.php?iuse=' . $tabUser[0]['user_id'] . '">cliquez</p>';
        if (mail($dest, $sujet, $corp, $entete)) {
            $etat = 'Votre message a bien été envoyé.';
            $colorEtat = "green";
        } else {
            $etat = 'Erreur, réessayez';
            $colorEtat = "red";
        }
    }
}

require_once("view/page/connexion/connexion.php");
