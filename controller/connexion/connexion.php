<?php
if (isset($_POST["nom"], $_POST["prenom"])) {
    if ($_POST["nom"] === "admin" && $_POST["prenom"] === "admin") {
        //header("Location:?section=dons");
        header("Location:?section=readAnnonce");
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION['userId'] = 1;
    }
}

require_once("view/page/connexion/connexion.php");
