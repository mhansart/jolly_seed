<?php
$msgInscription = "";
$emailsUsers = array();
$emailExist = 0;
$p = new Personne();
$tabUsers = $p->readUser();
foreach ($tabUsers as $oneUser) {
    array_push($emailsUsers, $oneUser['user_email']);
}
// récupérer les personnes et afficher
if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["rue"], $_POST["numero"], $_POST["codepostal"], $_POST["ville"], $_POST["mdp"], $_POST["telephone"])) {
    if (isset($_POST['checkbox'])) {
        $emailExist = in_array($_POST['email'], $emailsUsers);
        if ($emailExist) {
            $msgInscription = "Cet e-mail existe déjà.";
        } else {
            $picture = "default.png";
            $description = "undefined";
            $passwordCrypte = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $p->createUser($_POST["nom"], $_POST["prenom"], $_POST['email'], $_POST["rue"], $_POST["numero"], $_POST["codepostal"], $_POST['boite'], $_POST["ville"], $passwordCrypte, $_POST['telephone'], $picture, $description);
            $_SESSION['prenom'] = $_POST['prenom'];

            $lastUserId = $p->lastInsert();
            $_SESSION['user_id'] = $lastUserId[0]['dernier_id'];
            $_SESSION['user_city'] = $_POST["ville"];
            header("Location:?section=accueil");
        }
    } else {
        $msgInscription = "Vous devez accepter les conditions générales";
    }
}



include("view/page/inscription.php");
