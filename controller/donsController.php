<?php
// récupérer les annoncess et afficher

//Lectures du tableau 'like'
$f = new Annonce();
$tabLike = $f->readLikeByUserId($_SESSION['user_id']);

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
  $dons .= "<section id='don_".$value["ads_id"]."' class='box'>
              <div class='imageDon' style='background-image: url(uploads/" . $value["ads_picture"] . ")'>
              </div>
              <div class= 'dons'>
                <div class='titreDon'>
                  <img id='img_".$value["ads_id"]."' class='pomme pomme_" . $value["ads_category"] . "' src='./public/image/" . $imageDon . "' />
                  <h3>&nbsp;" . $value["ads_title"] . "</h3>
                </div>
                <div class='d-flex row'>
                  <p>Date: " . $value["ads_date"] . "&nbsp;</p>
                  <p> &nbsp; </p>
                  <p>&nbsp;Lieu : " . $value["ads_city"] . "</p>
                </div>
                <article>" . $value["ads_description"] . "</article>
                <div class='d-flex row'>
                <form class='contactAnnonce' action='#' method='post'>
                  <input type='hidden' name='contact' value='".$value["ads_user_id"]."'>
                  <input class='btnContact " . $value["ads_category"] . "' type='submit' value='Contact'>
                </form>";
                //gestion du CONTACT

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
       header("Location:?section=dons");
     } elseif ($likeDislike[0]["like_option"] === '1'){ //si n'aime plus alors enlever
       $d = new Annonce();
       $d ->deleteLike($_SESSION['user_id'], $_POST["like_ads_id$aime"]);
       header("Location:?section=dons");
     }
   }
}

//LECTURE dernier ADS_ID  pour nommage de photoperso
$ai = new Annonce();
$adsIds = $ai->readAdsId();
$lastAdsId = $adsIds[count($adsIds)-1]["ads_id"];
$futurAdsId = $lastAdsId+1;

 // CREATION d'UNE ANNONCE DON
 
if(isset($_POST["ads_category"], $_POST["ads_title"], $_POST["ads_description"]))
{
    $p = new Annonce();
    $active = 1;
    $date = date("Y-m-d h:i:sa"); 
    $type = "don";
    $time = "";
    
    //gestion d'images
    if (isset($_FILES["ads_picture"])) {
      var_dump($_FILES["ads_picture"]);
     if ($_FILES["ads_picture"]["name"]!== ""){
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["ads_picture"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      $check = filesize($_FILES["ads_picture"]["tmp_name"]);

      if ($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }

      // Allow certain file formats
      if (
          $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      ) {
          echo "Sorry, only JPG, JPEG & PNG files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
      } else {
          $newName = strtolower("d-". $futurAdsId . '.' . $imageFileType);
          echo $newName;
          if (move_uploaded_file($_FILES["ads_picture"]["tmp_name"], $target_dir . $newName)) {
          }
      }

      $annoncePicture = $newName;
     } else { // fixe les images prédéfinies
        if ($_POST["ads_category"]==="seed"){
          $annoncePicture = "seed.jpg";  
        } elseif ($_POST["ads_category"]==="flower"){
          $annoncePicture = "tomates.jpg";  
        } elseif ($_POST["ads_category"]==="ground"){
          $annoncePicture = "copeaux.jpg";  
        } else {
          $annoncePicture = "chene.jpg"; 
        }
      }
    } 

  $p->create($_SESSION['user_id'], $_SESSION['user_city'], $type, $_POST["ads_category"], $time, $date, $_POST["ads_description"], $annoncePicture, $active, $_POST["ads_title"]);
  header("Location:?section=dons");
}

//LIEN vers CONTACT
if (isset($_POST["contact"])) {
  header("Location:?section=chat");
  $_SESSION["chat"] = $_POST["contact"];
}

include("view/page/dons.php");