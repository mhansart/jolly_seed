<?php
include("../model/User.php");
$f = new User();
$tabAds = $f->readAds();

header('Content-Type: application/json');
echo(json_encode($tabAds));