<?php 
    // récupérer les annoncess et afficher
    $a = new Annonce();
    $tabAnnonces = $a->read();
    // var_dump($tabAnnonces);
    // générer le tableau html
    $table = "";
    $table .= "<tr><th>Type</th><th>Catégorie</th><th>Date</th><th>Description</th><th>image</th></tr>";
    foreach ($tabAnnonces as $value) {
        $tr = "<tr>";
        $tr .= "<td>" . $value["ads_type"] . "</td>";
        $tr .= "<td>" . $value["ads_category"] . "</td>";
        $tr .= "<td>" . $value["ads_date"] . "</td>";
        $tr .= "<td><a href='?section=update&id=". $value["ads_id"]."'>" . $value["ads_id"]. "</a></td>";
        $tr .= "<td><a href='?section=delete&id=". $value["ads_id"]."'>" . $value["ads_id"]. "</a></td>";
        $tr .= "</tr>";
        $table .= $tr;
        //echo($table);
    }
    
    // appeler la vue
    require_once("view/page/annonce/read.php");
?>