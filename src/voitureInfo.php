<?php

/* EN : The specific "Car information" view is displayed if the identifier of the selected car is not empty and depending on the page (visitor/admin).
Implemented an exit delay to display data more quickly and in the right places.

FR : On affiche la vue specifique "Infos voitures" si l'identifiant de la voiture sélectionnée n'est pas vide et en fonction de la page (visiteur/admin).
Mise en place d'une temporisation de sortie pour afficher les données plus rapidemment et aux bons endroits.
*/

include_once './config/autoload.php';
include_once 'config/Database.php';
include_once 'config/functions.php';

$v_id = $_GET['id'];


try {
  if (!empty($v_id)) {

    if ($_GET['page'] == 'vinfo') {
      $voitureController = new VoitureController();
      $voitureController->voitureInfos($v_id);

      ob_start();
      $horaireController = new HoraireController();
      $horaireController->affichageHeures();
      $horaires = ob_get_clean();

      require 'views/footer.php';
    } else if ($_GET['page'] == 'vinfoadmin') {
      $voitureController = new VoitureController();
      $voitureController->voitureInfosAdmin($v_id);

      ob_start();
      $horaireController = new HoraireController();
      $horaireController->affichageHeures();
      $horaires = ob_get_clean();
    }
  } else {
    throw new Exception("Page introuvable.");
  }
} catch (Exception $exception) {
  $msg = $exception->getMessage();
  error($msg);
  sessionAlert('danger', $msg);
}
