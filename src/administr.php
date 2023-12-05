
<?php 
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';
include_once './src/controllers/UserController.php';

ob_start(); 
$userController = new UserController();
$userController->affichageListUser();
$titre1='Utilisateurs';
$content1 = ob_get_clean();
ob_start(); 
$voitureController = new VoitureController();
$voitureController->affichageAll();
$titre2='Voitures à la vente';
$content2 = ob_get_clean();
ob_start(); 
$horaireController = new HoraireController();
$horaireController->affichageHeuresAdmin();
$titre3='Horaires';
$content3 = ob_get_clean();
ob_start(); 
$prestationController = new PrestationController();
$prestationController->affichageListAdmin();
$titre4='Prestations';
$content4 = ob_get_clean();
ob_start(); 
$avisController = new AvisController();
$avisController->affichageAdmin();
$titre5='Avis';
$content5 = ob_get_clean();

require "views/administration/administrationTemplate.php";
?>