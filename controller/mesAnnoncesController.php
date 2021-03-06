<?php

$mesdons = "";

$a = new Annonce();
$tabDons = $a->readAdsById($_SESSION['user_id']);
// var_dump($tabDons);
// générer le tableau html


$dons = "";
foreach ($tabDons as $value) {
  $isActive = $value["ads_active"] == '1' ? "" : 'opacity:0.5';
  $btnContent = $value["ads_active"] == '1' ? 'Désactiver cette annonce' : 'Réactiver cette annonce';
  $btnName = $value["ads_active"] == '1' ? 'desactiver' : 'reactiver';
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
  $adsTime = $value["ads_time"] !== "" ? "<p class='adsTime'>" . $value["ads_time"] . "</p>" : "";
  $mesdons .= "<section class='box'>
              <div class='imageDon' style='background-image: url(uploads/" . $value["ads_picture"] . "); " . $isActive . "'>
              </div>
              <div class= 'dons'>
                <div style='" . $isActive . "' class='titreDon'>
                  <img class='pomme' src='./public/image/" . $imageDon . "' />
                  <div>
                    <h3>" . $value["ads_title"] . "</h3>
                    " . $adsTime . "
                  </div>
                </div>
                <div style='" . $isActive . "' class='d-flex row date-info-ads'>
                  <p>Date: <span class='ads-date'>" . $value["ads_date"] . "</span></p>
                  <p> &nbsp; &nbsp; </p>
                  <p>&nbsp;Lieu : " . $value["ads_city"] . "</p>
                </div>
                <article class='ads-description' style='" . $isActive . "'>" . $value["ads_description"] . "</article>
                <div class='d-flex row justif-end w-100'>
                  <form class='desactiver-annonce' action='#' method='post'>
                    <input type='hidden' class='btn-active-id' name='" . $btnName . "' value='" . $value["ads_id"] . "'>
                    <input class='btnContact btnActive " . $value["ads_category"] . "' type='submit' value='" . $btnContent . "'>
                  </form>
                </div>
              </section>";
};

// if (isset($_POST["desactiver"])) {
//   $a->updateActive($_POST["desactiver"], "0");
//   header("Location:?section=mesAnnonces");
// }
// if (isset($_POST["reactiver"])) {
//   $a->updateActive($_POST["reactiver"], "1");
//   header("Location:?section=mesAnnonces");
// }

include("view/page/mesAnnonces.php");
