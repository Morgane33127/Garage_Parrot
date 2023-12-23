<?php
//echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/HoraireController.php';

$limit=6;

ob_start(); 
$avisController = new AvisController();
$avisController->countAvis();
$count = ob_get_clean();

if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $count) {
    $page = $_GET['p'];
} else {
    $page = 1;
}

ob_start(); 
$avisController = new AvisController();
$avisController->affichage($page, $limit);
$content = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();
require "views/avisTemplate.php";
?>