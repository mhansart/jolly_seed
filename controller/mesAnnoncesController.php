<?php

$mesdons = "";

$a = new Annonce();
$tabDons = $a->readAdsById($_SESSION['user_id']);
// var_dump($tabDons);
// générer le tableau html


$dons = "";
foreach ($tabDons as $value) {
    //définir la couleur du logo-pomme
    if ($value["ads_type"] === "don") {
        switch ($value["ads_category"]) {
            case "seed":
                $imageDon = "pomme-bleue.png";
                break;
            case "ground":
                $imageDon = "pomme-bordeaux.png";
                break;
            case "flower":
                $imageDon = "pomme-mauve.png";
                break;
            default:
                $imageDon = "pomme-jaune.png";
                break;
        }
    } else {
        $imageDon = "pomme-rouge.png";
    };
    // création de l'annonce
    $mesdons .= "<section class='box'>
              <div class='imageDon' style='background-image: url(public/image/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div class='titreDon'>
                  <img class='pomme' src='./public/image/" . $imageDon . "' />
                  <h3>&nbsp;" . $value["ads_title"] . "</h3>
                </div>
                <div class='d-flex row'>
                  <p>Date: " . $value["ads_date"] . "&nbsp;</p>
                  <p> &nbsp; </p>
                  <p>&nbsp;Lieu : " . $value["ads_city"] . "</p>
                </div>
                <article>" . $value["ads_description"] . "</article>
                <div class='d-flex row'>
                  <button class=" . $value["ads_category"] . " ><a href='#'>Contact</a>
                  </button>
                </div>
                </section>";
}

include("view/page/mesAnnonces.php");
