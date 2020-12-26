
<?php
include("../model/User.php");
$f = new User();
$tabUsers = $f->readUsers();

header('Content-Type: application/json');
echo(json_encode($tabUsers));


