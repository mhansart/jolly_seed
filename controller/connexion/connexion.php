<?php 
    if(isset($_POST["login"], $_POST["mdp"]))
    {
        if($_POST["login"] === "admin" && $_POST["mdp"] === "admin")
        {
            header("Location:?section=dons");
        }
    }

    require_once("view/page/connexion/connexion.php");
?>