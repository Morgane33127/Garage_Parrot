<?php
include_once './config/autoload.php';
include 'config/Database.php';
include 'src/controllers/VoitureController.php';
include 'src/controllers/HoraireController.php';

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
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}
