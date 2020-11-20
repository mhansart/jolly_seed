<?php 
    $id = "";
    $nom = "";
    $prenom = "";
    $adRue = "";
    $adNum = "";
    $adCp = "";
    $adVille = "";
    $sexeM = "";
    $sexeF = "";
    // récupérer les personnes et afficher
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $p = new Personne();
        $tabInfos = $p->readById($id);
        // var_dump($tabInfos);

        $nom = $tabInfos[0]["nom"];
        $prenom = $tabInfos[0]["prenom"];

        $sexe = $tabInfos[0]["sexe"];
        if($sexe === "M")
        {
            $sexeM = "checked";
        }
        else {
            $sexeF = "checked";
        }

        $adRue = $tabInfos[0]["ad_rue"];
        $adNum = $tabInfos[0]["ad_num"];
        $adCp = $tabInfos[0]["ad_cp"];
        $adVille = $tabInfos[0]["ad_ville"];
    }
    // soumet le form
    if(isset($_POST["nom"],$_POST["prenom"], $_POST["sexe"], $_POST["ad_rue"], $_POST["ad_num"], $_POST["ad_cp"], $_POST["ad_ville"], $_GET["id"]))
    {
        $p = new Personne();
        $p->update($_GET["id"], $_POST["nom"],$_POST["prenom"], $_POST["sexe"], $_POST["ad_rue"], $_POST["ad_num"], $_POST["ad_cp"], $_POST["ad_ville"]);
        header("Location:?section=read");
    }


    // appeler la vue
    require_once("view/page/personne/update.php");
?>