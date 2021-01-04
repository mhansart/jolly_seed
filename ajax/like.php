<?php
include("../model/User.php");

$task = "list";

if (array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

if ($task == "write") {
    postLike();
}
function postLike()
{
    $isFull = $_POST["isFull"];
    $adsId = $_POST["adsId"];
    $userId = $_POST["userId"];
    if ($isFull === "true") {

        $e = new User();
        $e->deleteLike($userId, $adsId);
    } else {
        $e = new User();
        $e->createLike($userId, $adsId, 1);
    }
    echo json_encode(["status" => "success"]);
}
