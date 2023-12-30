<?php

/* EN : We integrate autoload for models and controllers as well as the Database class.
We launch the connection, we retrieve the number of cars to display to manage the pagination then we display the view of the cars.
Implemented an exit delay to display data more quickly and in the right places.

FR : On intègre l'autoload pour les models et controllers ainsi que la classe Database.
On lance la connexion, on récupère le nombre de voiture à afficher pour gérer la pagination puis on affiche la vue des voitures et des horaires pour le footer.
Mise en place d'une temporisation de sortie pour afficher les données plus rapidemment et aux bons endroits.
*/

include_once './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';

// 6 cars per page
$limit = 6;

$db = new Database();
$db = $db->getConnection();
$annees = $db->query("SELECT DISTINCT annee FROM voitures");

ob_start();
$voitureController = new VoitureController();
$voitureController->countVoiture();
$count = ob_get_clean();

if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $count) {
    $page = $_GET['p'];
} else {
    $page = 1;
}

ob_start();
$voitureController = new VoitureController();
$voitureController->affichageCard($page, $limit);
$content = ob_get_clean();

ob_start();
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/voitureTemplate.php";
