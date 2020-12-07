<?php

$p = new Forum();
$tabForum = $p->readForum();
// générer le tableau html
$forum = "";

foreach ($tabForum as $oneForum) {
    $userId = $oneForum['user_id'];
    $u = new Personne();
    $tabUser = $u->readById($userId);
    $image = ($tabUser[0]['user_picture'] === "") ? 'public/image/default.png' : 'uploads/' . $tabUser[0]['user_picture'];
    $forum .= '<div class="one-forum-view">
    <h2>' . $oneForum['forum_title'] . '</h2>
    <div class="d-flex">
                    <div class="forum-user-pp" style="background-image:url(' . $image . ')"></div>
                    <div class="w-100">
                        <p class="quest-name"><strong>' . $tabUser[0]['user_firstname'] . ' ' . $tabUser[0]['user_name'] . ' </strong></p>
                        <p class="date">' . $oneForum['format_date'] . '</p>
                        <p>' . $oneForum['forum_msg'] . '</p>';
    $tags = explode(',', $oneForum['forum_tags']);
    foreach ($tags as $tag) {
        $forum .= '<span class="forum-tag">#' . $tag . '</span>';
    }
    $forum .= '<form action="#" method="post" class="w-100 d-flex">
                    <input type="hidden" name="name" value="' . $oneForum['forum_id'] . '">
                <button type="submit" class="voir-forum">Voir plus</button></form></div>
    </div></div>';
}
$forumDate = date("Y-m-d");
if (isset($_POST["qust-forum"], $_POST["text-forum"])) {
    if ($_POST["qust-forum"] !== "" && $_POST["text-forum"] !== "") {
        $p->createForum($_POST["qust-forum"], $_POST["text-forum"], $forumDate, $_SESSION['user_id'], str_replace(' ', '', $_POST['tag-forum']));
        header("Location:?section=forum");
    }
}
if (isset($_POST['name'])) {
    $_SESSION['forum'] = $_POST['name'];
    header("Location:?section=VoirPlusForum");
}

include("view/page/forum.php");
