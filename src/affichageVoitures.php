<?php

/* EN : To filter cars. If POST method detected we decode the JSON from JS and if the data is not empty we call the function
to filter and modify the view.

FR : Pour filtrer les voitures. Si méthode POST detectée on décode le JSON de JS et si les données ne sont pas vide on appelle la function 
pour filtrer et modifier la vue.
*/

include_once '../config/Database.php';
include_once '../config/const.php';
include_once '../src/controllers/VoitureController.php';
include_once '../src/models/VoitureManager.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  if (!empty($data['prixmin']) && !empty($data['prixmax']) && !empty($data['kmmin']) && !empty($data['kmmax']) && !empty($data['date'])) {

    // Processing to update the car list
    $prixMin = $data['prixmin'];
    $prixMax = $data['prixmax'];
    $kmMin = $data['kmmin'];
    $kmMax = $data['kmmax'];
    $dateSaisi = $data['date'];
    $voitureController = new VoitureController();
    $voituresMisesAJour =   $voitureController->filtrerVoitures($prixMin, $prixMax, $kmMin, $kmMax, $dateSaisi);
  } else {
    echo "Méthode non autorisée.";
  }
}
