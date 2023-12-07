<?php
include_once './config/autoload.php';
include 'config/Database.php';
include 'src/controllers/VoitureController.php';
include 'src/controllers/HoraireController.php';

$v_id = $_GET['id'];

try {
  if (!empty($v_id)) {

    $voitureController = new VoitureController();
    $voitureController->voitureInfos($v_id);

ob_start();
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();
require 'views/footer.php';

  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}
