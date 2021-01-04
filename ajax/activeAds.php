<?php
include("../model/User.php");

$task = "list";

if (array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

if ($task == "write") {
    activeAds();
}
function ActiveAds()
{

    if (!array_key_exists('active', $_POST)) {

        echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
        return;
    }
    $active = $_POST['active'];
    $adsId = $_POST["adsId"];

    $e = new User();
    $e->updateActive($adsId, $active);

    echo json_encode(["status" => "success"]);
}
