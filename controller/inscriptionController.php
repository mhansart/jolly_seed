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
    if ($_POST['checkbox'] === "on") {
        $emailExist = in_array($_POST['email'], $emailsUsers);
        if ($emailExist) {
            $msgInscription = "Cet e-mail existe déjà.";
        } else {
            $passwordCrypte = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $p->createUser($_POST["nom"], $_POST["prenom"], $_POST['email'], $_POST["rue"], $_POST["numero"], $_POST["codepostal"], $_POST['boite'], $_POST["ville"], $passwordCrypte, $_POST['telephone']);
            $_SESSION['prenom'] = $_POST['prenom'];

            $lastUserId = $p->lastInsert();
            $_SESSION['user_id'] = $lastUserId[0]['dernier_id'];
            header("Location:?section=accueil");
        }
    }
}



include("view/page/inscription.php");
