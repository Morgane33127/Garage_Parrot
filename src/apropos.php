<?php 
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/HoraireController.php';

ob_start(); 
$prestationController = new PrestationController();
$prestationController->affichage();
$content = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();
require "views/aproposTemplate.php";
?>