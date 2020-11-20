<?php 
    // récupérer les personnes et afficher
    if(isset($_POST["nom"],$_POST["prenom"], $_POST["sexe"], $_POST["ad_rue"], $_POST["ad_num"], $_POST["ad_cp"], $_POST["ad_ville"]))
    {
        $p = new Personne();
        $p->create($_POST["nom"],$_POST["prenom"], $_POST["sexe"], $_POST["ad_rue"], $_POST["ad_num"], $_POST["ad_cp"], $_POST["ad_ville"]);
        header("Location:?section=read");
    }


    // appeler la vue
    require_once("view/page/personne/create.php");
?>