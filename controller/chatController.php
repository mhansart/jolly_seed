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

foreach ($tabMessage as $message) {
    $category_user = $message['sender_id'] == $_SESSION['user_id'] ? "sender-user" : "receiver-user";
    $conversation .= '<div class="' . $category_user . '"><div class="infos-msg-text"><div class="msg-text-chat" >' . $message['msg_text'] . '</div><div class="msg-date-chat">' . $message['format_date'] . ' ' . $message['format_hour'] . '</div></div></div>';
}
$conversation .= '<div class="chat-send"><div class="btn-send-chat w-100"><form action="#" method="post" class="d-flex">
<input type="text" class="ipt-response-chat d-flex" name="msg-response">
<input type="hidden" name="repondre" value="' . $_SESSION["chat"] . '">
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



// print_r($_POST);
// $_POST["data"] = json_decode(
//     $_POST["data"],
//     true /* retourne un tableau associatif */
// );
// $msg = $_POST["data"]["message"];

include("view/page/chat.php");
