<?php 
 // récupérer les annoncess et afficher
 $d = new Annonce();
 $tabDons = $d->read();
 // var_dump($tabAnnonces);
 // générer le tableau html


$dons = "";
foreach ($tabDons as $value) {
  //définir la couleur du logo-pomme
  if ($value["ads_type"]==="don"){
    switch($value["ads_category"])
    {
    case "seed" :
      $imageDon = "pomme-bleue.png";
    break;
    case "ground" :
      $imageDon = "pomme-bordeaux.png";
    break;
    case "flower" :
      $imageDon = "pomme-mauve.png";
    break;
    default :
    $imageDon = "pomme-jaune.png";
    break;
    }
 } else {
  $imageDon = "pomme-rouge.png";
 };
// création de l'annonce
  $dons .= "<section class='box'>
              <div class='imageDon' style='background-image: url(public/image/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div class='d-flex row'>
                  <img class='pomme' src='./public/image/" .$imageDon. "' />
                  <h3>" . $value["ads_title"] . "</h3>
                  <i class='far fa-heart'></i>
                </div>
                <div class='d-flex row'>
                  <p>Date: ". $value["ads_date"] . "</p>
                  <p>Lieu : Ottignies</p>
                </div>
                <article>" . $value["ads_description"] . "</article>
                <button class=". $value["ads_category"] ." ><a href='#'>Contact</a>
                </button>
              </div>
            </section>";
}


    include("view/page/dons.php");
?>