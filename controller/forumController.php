<?php

$p = new Forum();
$tabForum = $p->readForum();
// générer le tableau html
$forum = "";

foreach ($tabForum as $oneForum) {
    $thisDate = substr($oneForum['forum_date'], 0, -9);
    $forum .= '<div class="one-forum">
                <h3>' . $oneForum['forum_title'] . '</h3>
                <p>' . $thisDate . '</p>
                <p>' . $oneForum['forum_msg'] . '</p>
                </div>';
}
$forumDate = date("Y-m-d h:i:sa");
if (isset($_POST["qust-forum"], $_POST["text-forum"])) {
    if ($_POST["qust-forum"] !== "" && $_POST["text-forum"] !== "") {
        $p->createForum($_POST["qust-forum"], $_POST["text-forum"], $forumDate, $_SESSION['userId']);
        header("Location:?section=forum");
    }
}

include("view/page/forum.php");
