<?php
include("../../model/User.php");
$f = new User();
$tabUsers = $f->read();
$tabForum = $f->readforum();
$allInfos = array('users' => $tabUsers, "forums" => $tabForum);
header('Content-Type: application/json');
echo json_encode($allInfos);
