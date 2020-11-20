<?php 
    if(isset($_POST["login"], $_POST["mdp"]))
    {
        if($_POST["login"] === "admin" && $_POST["mdp"] === "admin")
        {
            header("Location:?section=read");
        }
    }

    require_once("view/page/connexion/connexion.php");
?>