<?php 
    // récupérer les personnes et afficher
    $p = new Personne();
    $tabPersonnes = $p->read();
    // var_dump($tabPersonnes);
    // générer le tableau html
    $table = "";
    $table .= "<tr><th>Nom</th><th>Prénom</th><th>Ville</th><th>Modifier</th><th>Supprimer</th></tr>";
    foreach ($tabPersonnes as $value) {
        $tr = "<tr>";
        $tr .= "<td>" . $value["nom"] . "</td>";
        $tr .= "<td>" . $value["prenom"] . "</td>";
        $tr .= "<td>" . $value["ad_ville"] . "</td>";
        $tr .= "<td><a href='?section=update&id=". $value["id"]."'>" . $value["id"]. "</a></td>";
        $tr .= "<td><a href='?section=delete&id=". $value["id"]."'>" . $value["id"]. "</a></td>";
        $tr .= "</tr>";
        $table .= $tr;
        // var_dump($value);
    }


    // appeler la vue
    require_once("view/page/personne/read.php");
?>