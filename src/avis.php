<?php

/* EN : We integrate autoload for models and controllers as well as the Database class.
We launch the connection, then we display the view of the services.
Implemented an exit delay to display data more quickly and in the right places.

FR : On intègre l'autoload pour les models et controllers ainsi que la classe Database.
On affiche la vue des avis et des horaires pour le footer.
Mise en place d'une temporisation de sortie pour afficher les données plus rapidemment et aux bons endroits.
*/

include_once './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';

// Limit display to 6 notices per page
$limit = 6;

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
