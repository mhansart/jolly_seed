<?php 
    // aiguilleur
    if(isset($_GET["section"]))
    {
        switch($_GET["section"])
        {
            case "create":
                require_once("controller/personne/create.php");
            break;
            case "read":
                require_once("controller/personne/read.php");
            break;
            case "update":
                require_once("controller/personne/update.php");
            break;
            case "delete":
                require_once("controller/personne/delete.php");
            break;
            default:
                require_once("view/error/404.php");
            break;

        }
    }
    else {
        require_once("controller/connexion/connexion.php");
    }
?>