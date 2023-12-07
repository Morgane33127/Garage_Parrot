<?php 
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';


ob_start(); 
$prestationController = new PrestationController();
$prestationController->affichage();
$content1 = ob_get_clean();
ob_start(); 
$avisController = new AvisController();
$avisController->affichage();
$content2 = ob_get_clean();
ob_start(); 
$voitureController = new VoitureController();
$voitureController->affichageCard();
$content3 = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/accueilTemplate.php";

