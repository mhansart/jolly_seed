<?php
$p = new Forum();
$forumDate = date("Y-m-d");
$forum = $p->readById($_SESSION['forum']);
$userId = $forum[0]['user_id'];
$u = new Personne();
$tabUser = $u->readById($userId);
$image = ($tabUser[0]['user_picture'] === "") ? 'public/image/default.png' : 'uploads/' . $tabUser[0]['user_picture'];
$messages = $p->readMsgByForumId($_SESSION['forum']);

$thisForum = '<div class="one-forum">
                <h2>' . $forum[0]['forum_title'] . '</h2>
                <div class="d-flex voir-plus-quest">
                    <div class="forum-user-pp" style="background-image:url(' . $image . ')"></div>
                    <div>
                    <p class="quest-name"><strong>' . $tabUser[0]['user_firstname'] . ' ' . $tabUser[0]['user_name'] . ' </strong></p>
                    <p class="date">' . $forum[0]['format_date'] . '</p>
                    <p>' . $forum[0]['forum_msg'] . '</p>
                    <div class="voir-plus-tag">';
$tags = explode(',', $forum[0]['forum_tags']);
foreach ($tags as $tag) {
    $thisForum .= '<div class="forum-tag">
                    <form action="#" method="post" class="d-flex">
                        <input type="hidden" name="tags" value="' . $tag . '">
                        <input type="submit" value="#' . $tag . '">
                    </form>
                    </div>';
}
$thisForum .= '</div></div></div>';

foreach ($messages as $message) {
    $userMsgId = $message['user_id'];
    $tabUser = $u->readById($userMsgId);
    $imageResponse = 'uploads/' . $tabUser[0]['user_picture'];
    $classMsg = ($message['user_id'] === $forum[0]['user_id']) ? 'voir-plus-quest' : 'voir-plus-response';
    $thisForum .= '<div class="' . $classMsg . ' d-flex">
                    <div class="forum-user-pp" style="background-image:url(' . $imageResponse . ')"></div>
                    <div>
                        <p class="resp-name"><strong>' . $tabUser[0]['user_firstname'] . ' ' . $tabUser[0]['user_name'] . ' </strong></p>
                        <p class="date">' . $message['format_date'] . '</p>
                        <p>' . $message['response_msg'] . '</p>
                    </div>
                </div>';
};
$thisForum .= '</div>
                <div class="btn-send w-100">
                    <form action="#" method="post" class="d-flex send-msg-forum">
                        <input type="text" class="ipt-response-forum d-flex" name="msg-response">
                        <input class="forum-response-hidden-user" type="hidden" name="repondre" value="' . $_SESSION["user_id"] . '">
                        <input class="forum-response-hidden" type="hidden" name="repondre" value="' . $forum[0]['forum_id'] . '">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>';

// if (isset($_POST['repondre'])) {
//     if ($_POST['msg-response'] !== "") {
//         $p->createResponse($_POST['msg-response'], $forumDate, $_SESSION['user_id'], $_SESSION['forum']);
//         header("Location:?section=VoirPlusForum");
//     }
// }

if (isset($_POST['tags'])) {
    $_SESSION['forum_recherche'] = $_POST['tags'];
    header("Location:?section=forum");
}



include("view/page/voir_plus_forum.php");
