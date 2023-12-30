<?php

/* EN : We integrate autoload for models and controllers as well as the Database class.
Implemented an exit delay to display data more quickly and in the right places.

FR : On intègre l'autoload pour les models et controllers ainsi que la classe Database.
Mise en place d'une temporisation de sortie pour afficher les données plus rapidemment et aux bons endroits.
*/

include_once './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';

if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbpage) {
    $page = $_GET['p'];
} else {
    $page = 1;
}

//Limit notices and cars to 3
$limit = 3;

ob_start();
$prestationController = new PrestationController();
$prestationController->affichage();
$content1 = ob_get_clean();

ob_start();
$avisController = new AvisController();
$avisController->affichage($page, $limit);
$content2 = ob_get_clean();

ob_start();
$voitureController = new VoitureController();
$voitureController->affichageCard($page, $limit);
$content3 = ob_get_clean();

ob_start();
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/accueilTemplate.php";
