<?php

$conversation = "";
$p = new Personne();
$tabInterlocuteur = $p->readById($_SESSION["chat"]);
$tabUser = $p->readById($_SESSION["user_id"]);
$nomInterlocuteur = $tabInterlocuteur[0]['user_firstname'] . ' ' . $tabInterlocuteur[0]['user_name'];
$imageInterlocuteur = 'uploads/' . $tabInterlocuteur[0]['user_picture'];
$m = new Message();
$tabMessage = $m->readMessage($_SESSION["user_id"], $_SESSION["chat"]);
// var_dump($tabMessage);
if (count($tabMessage) !== 0) {

    foreach ($tabMessage as $message) {
        $category_user = $message['sender_id'] == $_SESSION['user_id'] ? "sender-user" : "receiver-user";
        $conversation .= '<div class="' . $category_user . '"><div class="infos-msg-text"><div class="msg-text-chat" >' . $message['msg_text'] . '</div><div class="msg-date-chat">' . $message['format_date'] . ' ' . $message['format_hour'] . '</div></div></div>';
    }
} else {
    $conversation .= '<div class="no-chat"><div class="picture-user-chat" style="background-image:url(' . $imageInterlocuteur . ')"></div><p >Vous n\'avez encore jamais envoyé de message à </p><span class="bold">' . $nomInterlocuteur . '.</span>
    <p>Envoyez lui votre premier message maintenant !</p></div>';
}
$conversation .= '</div><div class="chat-send"><div class="btn-send-chat w-100"><form action="#" method="post" class="d-flex send-msg-chat">
<input type="text" class="ipt-response-chat d-flex" name="msg-response">
<input type="hidden" class="receiver-id" name="repondre" value="' . $_SESSION["chat"] . '">
<input class="chat-response-hidden-user" type="hidden" name="repondre" value="' . $_SESSION["user_id"] . '">
<button type="submit"><i class="fas fa-paper-plane"></i></button>
</form></div></div>';

if (isset($_POST['repondre'])) {
    if ($_POST['msg-response'] !== "") {
        $msgDate = date("Y-m-d");
        $msgHour = date("H:i:s");
        $m->createResponse($_SESSION['user_id'], $_SESSION['chat'], $_POST["msg-response"], $msgDate, $msgHour);
        header("Location:?section=chat");
    }
}

include("view/page/chat.php");
