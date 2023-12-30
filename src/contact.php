<?php

/* EN : We integrate autoload for models and controllers as well as the Database class.
We display the schedule view for the footer.
Implemented an exit delay to display data more quickly and in the right places.

FR : On intègre l'autoload pour les models et controllers ainsi que la classe Database.
On affiche la vue des des horaires pour le footer.
Mise en place d'une temporisation de sortie pour afficher les données plus rapidemment et aux bons endroits.
*/

include_once './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';

ob_start();
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();

require "views/contactTemplate.php";
