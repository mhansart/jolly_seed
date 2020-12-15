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
                  </button>"; 
           //pose d'un coeur vide       
          $Like = "far fa-heart";
          for($i =0; $i < count($tabLike); $i++){
            if ($tabLike[$i]["like_ads_id"] === $value["ads_id"]){
                $Like = "fas fa-heart"; // coeur plein si like
              }
            }
          $aime = $value["ads_id"];
          $dons .= " <form method='post' >
                        <input class='aime' type='hidden' id='aime$aime' name='like_ads_id$aime' value='$aime'/>
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