<?php

$allSearch = "";
$a = new Annonce();
$f = new Forum();
$tabAnnonces = $a->read();
$tabForums = $f->readforum();
$tabLike = $a->readLikeByUserId($_SESSION['user_id']);

foreach ($tabAnnonces as $value) {
    if ($value["ads_type"] === "don") {
        switch ($value["ads_category"]) {
            case "seed":
                $imageDon = "pomme-bleue.png";
                $classCategory = "seed";
                break;
            case "ground":
                $imageDon = "pomme-bordeaux.png";
                $classCategory = "ground";
                break;
            case "flower":
                $imageDon = "pomme-mauve.png";
                $classCategory = "flower";
                break;
            default:
                $imageDon = "pomme-jaune.png";
                $classCategory = "plant";
                break;
        }
    } else {
        $imageDon = "pomme-rouge.png";
        if ($value['ads_title'] === "Demande") {
            $classCategory = "demande";
        } else {
            $classCategory = "offre";
        }
    };
    // création de l'annonce
    $allSearch .= "<section id='don_" . $value["ads_id"] . "' class='box " . $classCategory . "-search'>
                  <div class='imageDon' style='background-image: url(public/image/" . $value["ads_picture"] . ")'>
                  </div>
                  <div class= 'dons'>
                    <div class='titreDon'>
                      <img id='img_" . $value["ads_id"] . "' class='pomme' src='./public/image/" . $imageDon . "' />
                      <h3>&nbsp;" . $value["ads_title"] . "</h3>
                    </div>
                    <div class='d-flex row '>
                      <p>Date: " . $value["ads_date"] . "&nbsp;</p>
                      <p> &nbsp; </p>
                      <p>&nbsp;Lieu : " . $value["ads_city"] . "</p>
                    </div>
                    <article>" . $value["ads_description"] . "</article>
                    <div class='d-flex row btn-ads-search'>
                    <form class='contactAnnonce' action='#' method='post'>
                      <input type='hidden' name='contact' value='" . $value["ads_user_id"] . "'>
                      <input class='btnContact " . $value["ads_category"] . "' type='submit' value='Contact'>
                    </form>";
    //gestion du CONTACT

    //pose d'un coeur vide       
    $Like = "far fa-heart";
    for ($i = 0; $i < count($tabLike); $i++) {
        if ($tabLike[$i]["like_ads_id"] === $value["ads_id"]) {
            $Like = "fas fa-heart"; // coeur plein si like
        }
    }
    $aime = $value["ads_id"];
    $allSearch .= " <form method='post' >
                           <input class='aime' type='hidden' id='aime$aime' name='like_ads_id$aime' value='$aime'/>
                           <button class='coeur' type='submit'><i class='$Like'></i></button>
                         </form>
                   </div>
                 </div>
               </section>";

    if (isset($_POST["like_ads_id$aime"])) { //lecture des likes
        $r = new annonce();
        $likeDislike = $r->readLikeByUserIdAndAdsId($_SESSION['user_id'], $_POST["like_ads_id$aime"]);
        if (empty($likeDislike)) { //si vide alors créer
            $l = new Annonce();
            $l->createLike($_SESSION['user_id'], $_POST["like_ads_id$aime"], "1");
            header("Location:?section=search");
        } elseif ($likeDislike[0]["like_option"] === '1') { //si n'aime plus alors enlever
            $d = new Annonce();
            $d->deleteLike($_SESSION['user_id'], $_POST["like_ads_id$aime"]);
            header("Location:?section=search");
        }
    }
}
foreach ($tabForums as $oneForum) {
    $userId = $oneForum['user_id'];
    $u = new Personne();
    $tabUser = $u->readById($userId);
    $image = ($tabUser[0]['user_picture'] === "") ? 'public/image/default.png' : 'uploads/' . $tabUser[0]['user_picture'];
    $allSearch .= '<div class="one-forum-view forum-search">
    <h2>' . $oneForum['forum_title'] . '</h2>
    <div class="d-flex">
                    <div class="forum-user-pp" style="background-image:url(' . $image . ')"></div>
                    <div class="w-100">
                        <p class="quest-name"><strong>' . $tabUser[0]['user_firstname'] . ' ' . $tabUser[0]['user_name'] . ' </strong></p>
                        <p class="date">' . $oneForum['format_date'] . '</p>
                        <p>' . $oneForum['forum_msg'] . '</p>';
    $tags = explode(',', $oneForum['forum_tags']);
    foreach ($tags as $tag) {
        $allSearch .= '<span class="forum-tag">#' . $tag . '</span>';
    }
    $allSearch .= '<form action="#" method="post" class="w-100 d-flex">
                    <input type="hidden" name="name" value="' . $oneForum['forum_id'] . '">
                <button type="submit" class="voir-forum">Voir plus</button></form></div>
    </div></div>';
}


if (isset($_POST["contact"])) {
    header("Location:?section=chat");
    $_SESSION["chat"] = $_POST["contact"];
}

if (isset($_POST['name'])) {
    $_SESSION['forum'] = $_POST['name'];
    header("Location:?section=VoirPlusForum");
}



include("view/page/search.php");
