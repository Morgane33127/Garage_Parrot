<?php

require './config/db.php';
$annees = $pdo->query("SELECT DISTINCT annee FROM voitures");
$result = $pdo->query("SELECT COUNT(*) AS count FROM voitures")->fetch(PDO::FETCH_OBJ);

$page=1;

require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';


ob_start(); 
$voitureController = new VoitureController();
$voitureController->affichageCard();
$content = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/voitureTemplate.php";
