<?php
// aiguilleur
if (isset($_GET["section"])) {
    switch ($_GET["section"]) {
        case 'accueil':
            include("controller/accueilController.php");
            break;
        case 'connexion':
            require_once("controller/connexion/connexion.php");
            break;
        case 'inscription':
            require_once("controller/inscriptionController.php");
            break;
        case 'dons':
            include("controller/donsController.php");
            break;
        case 'jardiniers':
            include("controller/jardiniersController.php");
            break;
        case 'aPropos':
            include("controller/aProposController.php");
            break;
        case 'forum':
            include("controller/forumController.php");
            break;
        case 'temoignages':
            include("controller/temoignagesController.php");
            break;
        case 'contact':
            include("controller/contactController.php");
            break;
        case 'mentionsLegales':
            include("controller/mentionsController.php");
            break;
        case 'VoirPlusForum':
            include("controller/VoirPlusForumController.php");
            break;
        case 'moncompte':
            include("controller/moncompteController.php");
            break;
        case 'mesAnnonces':
            include("controller/mesAnnoncesController.php");
            break;
        case 'mesFavoris':
            include("controller/mesFavorisController.php");
            break;
        case 'chat':
            include("controller/chatController.php");
            break;
        case 'search':
            include("controller/searchController.php");
            break;
        case 'deconnexion':
            require_once("controller/deconnexionController.php");
            break;
        case "createAnnonce":
            require_once("controller/annonce/create.php");
            break;
        case "readAnnonce":
            require_once("controller/annonce/read.php");
            break;
        case "updateAnnonce":
            require_once("controller/annonce/update.php");
            break;
        case "deleteAnnonce":
            require_once("controller/annonce/delete.php");
            break;
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
} else {
    require_once("controller/connexion/connexion.php");
}
