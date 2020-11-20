<?php 
    if(isset($_POST["nom"], $_POST["prenom"]))
    {
        if($_POST["nom"] === "admin" && $_POST["prenom"] === "admin")
        {
            header("Location:?section=dons");
        }
    }

    require_once("view/page/connexion/connexion.php");
?>