<?php 
    // récupérer les personnes et afficher
    $id = "";
    $nom = "";
    $prenom = "";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $p = new Personne();
        $tabInfos = $p->readById($id);
        // var_dump($tabInfos);

        $nom = $tabInfos[0]["nom"];
        $prenom = $tabInfos[0]["prenom"];

    }

    // soumet
    if(isset($_POST["id"]))
    {
        $p = new Personne();
        $p->delete($id);
        header("Location:?section=read");
    }


    // appeler la vue
    require_once("view/page/personne/delete.php");
?>