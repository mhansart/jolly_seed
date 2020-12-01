<?php
session_start();
ob_start();
require_once("model/Annonce.php");
require_once("model/Personne.php");
require_once("view/html/head.php");
require_once("view/menu/menu.php");

require_once("controller/router.php");

require_once("view/menu/menu_footer.php");
require_once("view/html/footer.php");
