<?php
$mesfavoris = "";
$a = new Annonce();
$tabAnnonceId = $a->readLikeByUserId($_SESSION["user_id"]);
if (!empty($tabAnnonceId)) {
    foreach ($tabAnnonceId as $annonces) {
        $tabAnnonceFav = $a->readById($annonces['like_ads_id']);
        foreach ($tabAnnonceFav as $value) {
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
            $mesfavoris .= "<section class='box'>
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
                        <form class='contactAnnonce' action='#' method='post'>
                          <input type='hidden' name='contact' value='" . $value["ads_user_id"] . "'>
                          <input class='btnContact " . $value["ads_category"] . "' type='submit' value='Contact'>
                        </form>";
            //gestion du CONTACT

            //pose d'un coeur vide       
            $Like = "fas fa-heart";
            $aime = $value["ads_id"];
            $mesfavoris .= " <form method='post' >
                               <input class='aime' type='hidden' id='aime$aime' name='dislike' value='$aime'/>
                               <button class='coeur' type='submit'><i class='$Like'></i></button>
                             </form>
                       </div>
                     </div>
                   </section>";
        }
    }
} else {
    $mesfavoris .= '<p class="no-annonce">Vous n\'avez encore sauvegardé aucune annonce</p>';
}

if (isset($_POST["dislike"])) { //lecture des likes
    $r = new Annonce();
    $r->deleteLike($_SESSION['user_id'], $_POST["dislike"]);
    header("Location:?section=mesFavoris");
}

if (isset($_POST["contact"])) {
    header("Location:?section=chat");
    $_SESSION["chat"] = $_POST["contact"];
}

include("view/page/mesFavoris.php");
