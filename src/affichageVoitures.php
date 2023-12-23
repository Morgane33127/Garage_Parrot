<?php
  include '../config/Database.php';
  include '../src/controllers/VoitureController.php';
  include '../src/models/VoitureManager.php';


// Gestion de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);


if(!empty($data['prix'])){

  // Traitement pour mettre à jour la liste des voitures
  $prixSaisi = $data['prix'];
  $voitureController = new VoitureController();
  $voituresMisesAJour =   $voitureController->filtrerPrice($prixSaisi);

} else if (!empty($data['km'])){
  // Traitement pour mettre à jour la liste des voitures
  $kmSaisi = $data['km'];
  $voitureController = new VoitureController();
  $voituresMisesAJour =   $voitureController->filtrerKm($kmSaisi);

} else if (!empty($data['date'])){
  // Traitement pour mettre à jour la liste des voitures
  $dateSaisi = $data['date'];
  $voitureController = new VoitureController();
  $voituresMisesAJour =   $voitureController->filtrerDate($dateSaisi);

}
} else {
  echo "Méthode non autorisée.";
}

?>

