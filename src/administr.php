<?php 
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';

ob_start(); 
$prestationController = new HoraireController();
$prestationController->affichageHeuresAdmin();
$content1 = ob_get_clean();
ob_start();
ob_start(); 
$prestationController = new PrestationController();
$prestationController->affichageListAdmin();
$content2 = ob_get_clean();
ob_start(); 
$avisController = new AvisController();
$avisController->affichageAdmin();
$content3 = ob_get_clean();

require "views/administrationTemplate.php";
?>