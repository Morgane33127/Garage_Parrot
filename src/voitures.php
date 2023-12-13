<?php

require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';

if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $totalCount) {
    $page = $_GET['p'];
} else {
    $page = 1;
}

$limit=6;

$db = new Database();
$db = $db->getConnection();
$annees = $db ->query("SELECT DISTINCT annee FROM voitures");

ob_start(); 
$voitureController = new VoitureController();
$voitureController->countVoiture();
$count = ob_get_clean();


ob_start(); 
$voitureController = new VoitureController();
$voitureController->affichageCard($page, $limit);
$content = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/voitureTemplate.php";
