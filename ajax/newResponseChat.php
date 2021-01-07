<?php
include("../model/User.php");

$task = "list";

if (array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

if ($task == "write") {
    postMessage();
}
function postMessage()
{

    if (!array_key_exists('content', $_POST)) {

        echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
        return;
    }
    $content = $_POST['content'];
    $receiverId = $_POST['receiverId'];
    $msgDate = date("Y-m-d");
    $msgHour = date("H:i:s");
    $userId = $_POST["userId"];

    $e = new User();
    $e->createResponseChat($userId, $receiverId, $content, $msgDate, $msgHour, '0');

    echo json_encode(["status" => "success"]);
}
