<?php

$allSearch = "";
$a = new Annonce();
$f = new Forum();
$visibles = "none";
$tabAnnonces = $a->read();
$tabForums = $f->readforum();
$tabLike = $a->readLikeByUserId($_SESSION['user_id']);
foreach ($tabAnnonces as $value) {
    $posTitle = strpos(strtolower($value['ads_title']), strtolower($_SESSION["search-general"]));
    $posDescription = strpos(strtolower($value['ads_description']), strtolower($_SESSION["search-general"]));
    if ($posDescription !== false || $posTitle !== false) {
        if ($value["ads_type"] === "don") {
            switch ($value["ads_category"]) {
                case "seed":
                    $imageDon = "pomme-bleue.png";
                    $classCategory = "dons seed";
                    break;
                case "ground":
                    $imageDon = "pomme-bordeaux.png";
                    $classCategory = "dons ground";
                    break;
                case "flower":
                    $imageDon = "pomme-mauve.png";
                    $classCategory = "dons flower";
                    break;
                default:
                    $imageDon = "pomme-jaune.png";
                    $classCategory = "dons plant";
                    break;
            }
        } else {
            $imageDon = "pomme-rouge.png";
            if ($value['ads_title'] === "Demande") {
                $classCategory = "jardiniers demande";
            } else {
                $classCategory = "jardiniers offre";
            }
        };
        // création de l'annonce
        $adsTime = $value["ads_time"] !== "" ? "<p class='adsTime'>" . $value["ads_time"] . "</p>" : "";
        $disabled = $value["ads_user_id"] == $_SESSION['user_id'] ? "disabled" : "";
        $allSearch .= "<section id='don_" . $value["ads_id"] . "' class='box " . $classCategory . "-search'>
                  <div class='imageDon' style='background-image: url(uploads/" . $value["ads_picture"] . ")'>
                  </div>
                  <div class= 'dons'>
                    <div class='titreDon'>
                      <img id='img_" . $value["ads_id"] . "' class='pomme' src='./public/image/" . $imageDon . "' />
                      <div>
                        <h3>" . $value["ads_title"] . "</h3>
                        " . $adsTime . "
                      </div>
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
                      <input class='btnContact " . $value["ads_category"] . "' type='submit' value='Contact' " . $disabled . ">
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
        $allSearch .= " <form class='coeurs' method='post' >
                            <input class='aime' type='hidden' id='aime$aime' name='like_ads_id$aime' value='$aime'/>
                            <input class='user_id' type='hidden' value='" . $_SESSION['user_id'] . "'/>
                            <button class='coeur' type='submit'><i class='$Like'></i></button>
                        </form>
                   </div>
                 </div>
               </section>";
    }
}
foreach ($tabForums as $oneForum) {
    $posSubject = strpos(strtolower($oneForum['forum_msg']), strtolower($_SESSION["search-general"]));
    $posTags = strpos(strtolower($oneForum['forum_tags']), strtolower($_SESSION["search-general"]));
    $posTitre = strpos(strtolower($oneForum['forum_title']), strtolower($_SESSION["search-general"]));
    if ($posTitre !== false || $posTags !== false || $posSubject !== false) {
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
            $allSearch .= '<div class="forum-tag">
        <form action="#" method="post" class="d-flex">
            <input type="hidden" name="tags" value="' . $tag . '">
            <input type="submit" value="#' . $tag . '">
        </form>
        </div>';
        }
        $allSearch .= '<form action="#" method="post" class="w-100 d-flex">
                    <input type="hidden" name="name" value="' . $oneForum['forum_id'] . '">
                <button type="submit" class="voir-forum">Voir plus</button></form></div>
    </div></div>';
    }
}

if ($allSearch === "") {
    $visibles = "block";
}


if (isset($_POST["contact"])) {
    header("Location:?section=chat");
    $_SESSION["chat"] = $_POST["contact"];
}

if (isset($_POST['name'])) {
    $_SESSION['forum'] = $_POST['name'];
    header("Location:?section=VoirPlusForum");
}
if (isset($_POST['tags'])) {
    $_SESSION['forum_retour'] = $_SESSION['forum'];
    $_SESSION['forum_recherche'] = $_POST['tags'];
    header("Location:?section=forum");
}



include("view/page/search.php");
