<?php
$lesInterlocuteurs = "";
$m = new Message();
$tabMessages = $m->readById($_SESSION['user_id']);
$interlocuteur = array();
foreach ($tabMessages as $messages) {
    if ($messages['sender_id'] !== $_SESSION['user_id'] && !in_array($messages['sender_id'], $interlocuteur)) {
        array_push($interlocuteur, $messages['sender_id']);
    } elseif ($messages['receiver_id'] !== $_SESSION['user_id'] && !in_array($messages['receiver_id'], $interlocuteur)) {
        array_push($interlocuteur, $messages['receiver_id']);
    }
}
$p = new Personne();
foreach ($interlocuteur as $personne) {
    $tabUser = $p->readById($personne);
    $lesInterlocuteurs .= '<form class="oneChat" action="#" method="post"><input type="hidden" name="chat" value="' . $personne . '">
    <input class="user-interlocuteur" type="submit" value="' . $tabUser[0]['user_firstname'] . ' ' . $tabUser[0]['user_name'] . '"></form>';
}

if (isset($_POST["chat"])) {
    header("Location:?section=chat");
    $_SESSION["chat"] = $_POST["chat"];
}


?>


<div class="menu-mon-compte w-100">
    <nav class="d-flex">
        <ul class="d-flex h-100">
            <li id="menu-mesinfos">
                <a href="?section=moncompte"><span>Mes infos</span><i class="fas fa-user li-icon"></i></a>
            </li>
            <li id="menu-mesannonces">
                <a href="#">Mes annonces</a>
            </li>
            <li id="menu-mesfavoris">
                <a href="#">Mes favoris</a>
            </li>
            <li id="menu-messagerie">
                <a id="menu-messagerie-a" href="#">Messagerie</a>
                <div class="allMsg-menu">
                    <div class="padding-search-bar">
                        <div class="search-bar-message d-flex w-100"><input class="ipt-search-msg w-90" /><i class="fas fa-search"></i></div>
                    </div>
                    <?= $lesInterlocuteurs ?>
                </div>
            </li>
        </ul>
    </nav>
</div>