<?php
// récupérer les annoncess et afficher

$d = new Annonce();
$tabDons = $d->readByCategoryType("time");
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
  $dons .= "<section class='box'>
              <div class='imageDon' style='background-image: url(public/image/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div>
                  <img class='pomme' src='./public/image/" . $imageDon . "' />
                  <h3>&nbsp;" . $value["ads_title"] . "</h3>
                </div>
                <div class='d-flex row'>
                  <p>Date: " . $value["ads_date"] . "&nbsp;</p>
                  <p> &nbsp; </p>
                  <p>&nbsp;Lieu : Ottignies</p>
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

if(isset($_POST["ads_category"], $_POST["ads_title"], $_POST["ads_description"]))
{
    $p = new Annonce();
    $active = 1;
    $date = date("Y-m-d h:i:sa"); 
    if ($_POST["ads_category"]==="time"){
      
      $type = "jardinier";
    }
    else{
      $type = "don";
    }
    if(isset($_POST["ads_time"])){
      $time = $_POST["ads_time"]; 
    } else {
      $time = "";
    }
    if(isset($_POST["ads_titleSecondaire"])){
      $title = $_POST["ads_titleSecondaire"];
    } else {
      $title = $_POST["ads_title"];
    }
    echo($_POST["ads_picture"]);
    if(isset($_POST["ads_picture"])){
    $picture = $_POST["ads_picture"];
    } elseif ($_POST["ads_category"]==="seed"){
      $picture = "seed.jpg";  
    } elseif ($_POST["ads_category"]==="flower"){
      $picture = "tomates.jpg";  
    } elseif ($_POST["ads_category"]==="ground"){
      $picture = "copeaux.jpg";  
    } else {
      $picture = "chene.jpg"; 
    }
    echo($picture);
    $p->create($type, $_POST["ads_category"], $time, $date, $_POST["ads_description"], $picture, $active, $title);
    header("Location:?section=dons");
}



include("view/page/dons.php");