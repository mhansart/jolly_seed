<?php
// configuration smtp/server -> https://waytolearnx.com/2020/01/comment-configurer-wampserver-pour-envoyer-un-mail-depuis-localhost-en-php.html
$etat = "";
$colorEtat = "";
if (isset($_POST['message'])) {
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From: ' . $_POST['email'] . "\r\n";
    $dest = "info.jollyseed@gmail.com";
    $sujet = "Message envoyé depuis la page de contact de Jolly Seed";
    $corp = '<h1>Message envoyé depuis la page Contact de Jolly Seed</h1>
  <p><strong>Nom : </strong>' . $_POST['nom'] . ' ' . $_POST['prenom'] . '<br>
  <strong>Email : </strong>' . $_POST['email'] . '<br>
  <strong>Message : </strong>' . $_POST['message'] . '</p>';
    if (mail($dest, $sujet, $corp, $entete)) {
        $etat = 'Votre message a bien été envoyé.';
        $colorEtat = "green";
    } else {
        $etat = 'Erreur, réessayez';
        $colorEtat = "red";
    }
}
require_once("view/page/contact.php");
