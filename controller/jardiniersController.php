<?php
// récupérer les annoncess et afficher

$e = new Annonce();

$tabDons = $e->readByCategoryTime("time");
// var_dump($tabDons);
// générer le tableau html


$dons = "";
foreach ($tabDons as $value) {
  // création de l'annonce
  $dons .= "<section class='box'>
              <div class='imageDon' style='background-image: url(public/image/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div>
                  <img class='pomme' src='./public/image/pomme-rouge.png' />
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
                  <i class='far fa-heart'></i>
                </div>
              </div>
            </section>";

}
$i = new Annonce();
  $infosUser = $i->readByUserId($_SESSION['user_id']);
  $annoncePicture = $infosUser[0]["user_picture"]; 
  
if(isset($_POST["ads_titleSecondaire"], $_POST["ads_time"], $_POST["ads_description"]))
{
  $p = new Annonce();
  $active = 1;
  $date = date("Y-m-d h:i:sa"); 
  $type = "jardinier";
  $category = "time";
   
  if ($_POST["ads_titleSecondaire"]==="Temps offert"){
    $title = "Offre";
  } else {
    $title = "Demande";
  }
  //IMAGES
  $j = new Annonce();
  $infosUser = $j->readByUserId($_SESSION['user_id']);
  $annoncePicture = $infosUser[0]["user_picture"]; 
  if(isset($_POST["photoPerso"])){
      $annoncePicture = $infosUser[0]["user_picture"]; 
  } else {
  $annoncePicture = "avatar.png";
  }
  $p->create($_SESSION['user_id'], $_SESSION['user_city'], $type, $category, $_POST["ads_time"], $date, $_POST["ads_description"], $annoncePicture, $active, $title);
  //header("Location:?section=jardiniers");
}

include("view/page/jardiniers.php");
