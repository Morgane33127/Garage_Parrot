<?php
echo "<br><br><br><br><br>";
include 'config/Database.php';
include 'src/controllers/VoitureController.php';
include 'src/models/VoitureManager.php';

$v_id = $_GET['id'];

try {
  if (!empty($v_id)) {

    $voitureController = new VoitureController();
    $voitureController->voitureInfos($v_id);
    $voitureController->getImage();

  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}

require_once 'footer.php';
