<?php
//Lectures du tableau 'like'
$a = new Annonce();
$tabLike = $a->readLikeByUserId($_SESSION['user_id']);

// récupérer les annonces et afficher
$e = new Annonce();
$tabJardiniers = $e->readByCategoryTime("time");
// var_dump($tabJardiniers);
// générer le tableau html

$dons = "";
foreach ($tabJardiniers as $value) {
  // création de l'annonce
  $dons .= "<section id='don_".$value["ads_id"]."' class='box'>
              <div class='imageDon' style='background-image: url(uploads/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div>
                  <img id='img_".$value["ads_id"]."' class='pomme' src='./public/image/pomme-rouge.png' />
                  <h3 id='titre_".$value["ads_id"]."' class='titreTemps'>&nbsp;" . $value["ads_title"] . "</h3>
                </div>
                <div class='d-flex row sb'>
                  <p>Date: " . $value["ads_date"] . "&nbsp;</p>
                  <p> &nbsp; </p>
                  <p>&nbsp;Lieu : " . $value["ads_city"] . "</p>
                </div>
                <article>" . $value["ads_description"] . "</article>
                <div class='d-flex row btn-ads-search'>";
      //gestion du bouton CONTACT selon utilisateur
      if($value["ads_user_id"]===$_SESSION['user_id']){
          $dons .= "<form class='contactAnnonce' action='#' method='post'>
                    <input type='hidden' name='contact' value='" . $value["ads_user_id"] . "'>
                    <input class='btnContact " . $value["ads_category"] . "' disabled type='submit' value='Contact'>
                  </form>";
                } else {
          $dons .= "<form class='contactAnnonce' action='#' method='post'>
                    <input type='hidden' name='contact' value='" . $value["ads_user_id"] . "'>
                    <input class='btnContact " . $value["ads_category"] . "' type='submit' value='Contact'>
                  </form>";
                }
           //pose d'un coeur vide       
          $Like = "far fa-heart";
          for($i =0; $i < count($tabLike); $i++){
            if ($tabLike[$i]["like_ads_id"] === $value["ads_id"]){
                $Like = "fas fa-heart"; // coeur plein si like
              }
            }
          $aime = $value["ads_id"];
          $dons .= "<form class='coeurs' method='post' >
                       <input class='aime' type='hidden' id='aime$aime' name='like_ads_id$aime' value='$aime'/>
                       <input class='user_id' type='hidden' value='". $_SESSION['user_id']."'/>
                       <button class='coeur' type='submit'><i class='$Like'></i></button>
                     </form>
                </div>
              </div>
            </section>";
           
    if(isset($_POST["like_ads_id$aime"])) 
    { //lecture des likes
      $r = new annonce(); 
      $likeDislike = $r->readLikeByUserIdAndAdsId($_SESSION['user_id'],$_POST["like_ads_id$aime"]);
      if  (empty($likeDislike)) { //si vide alors créer
        $l = new Annonce();
        $l->createLike($_SESSION['user_id'], $_POST["like_ads_id$aime"], "1");
        header("Location:?section=jardiniers");
      } elseif ($likeDislike[0]["like_option"] === '1'){ //si n'aime plus alors enlever
        $d = new Annonce();
        $d ->deleteLike($_SESSION['user_id'], $_POST["like_ads_id$aime"]);
        header("Location:?section=jardiniers");
      }
    }
    
}
// CREATION d'UNE ANNONCE JARDINIER
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

//LIEN vers CONTACT
if (isset($_POST["contact"])) {
  header("Location:?section=chat");
  $_SESSION["chat"] = $_POST["contact"];
}

include("view/page/jardiniers.php");