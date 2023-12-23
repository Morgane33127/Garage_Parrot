<?php

class VoitureController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function countVoiture()
  {

    $model = new VoitureManager($this->db);
    echo $totalCount = $model->getTotalVoitureCount();
  }

  public function affichageCard($page, $limit)
  {
    $offset = ($page - 1) * $limit;
    // Obtenir les détails de les prestations
    $model = new VoitureManager($this->db);
    $voitures = $model->affichageVoitures($limit, $offset);
    $totalCount = $model->getTotalVoitureCount();
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = 'public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      include 'src/views/voitureCard.php'; // Afficher la vue voiture
    }
    if (isset($_GET['page']) && $_GET['page'] == 'vehicules') {
      include 'src/views/pagination.php'; // Afficher la pagination
    }
  }

  
  public function affichageAll()
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresAll();
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = 'public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      include 'src/views/administration/voitureCardAdmin.php'; // Afficher la vue voiture
    }
  }
  

  public function voitureInfos($id)
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
    include 'src/views/voitureInfos.php'; // Afficher la vue voitureInfos

  }

  public function voitureInfosAdmin($id)
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
    include 'src/views/administration/voitureInfosAdmin.php'; // Afficher la vue voitureInfos

  }

  public function modifierVoiture($donnees)
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->updateVoiture($donnees);
  }

  public function filtrerPrice($prix)
  {
    $page = 1;
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresPrix($prix, $page);
    $response = '';
    if (count($voitures) != 0) {
      if ($_GET['page'] = 'vehicules') {
        echo count($voitures) . " résultat(s) :";
      } 
      foreach ($voitures as $row) {
        $id = $row->getId();
        $titre = $row->getTitre();
        $description = $row->getPetiteDescription();
        $img = 'public/assets/img/' . $row->getImage();
        $prix = number_format($row->getPrix(), 0, ',', ' ');
        include '../src/views/voitureCard.php';
      }
    } else {
      echo "Aucun résultat.";
    }
  }

  public function filtrerKm($km)
  {
    $page = 1;
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresKm($km, $page);
    $response = '';
    if ($_GET['page'] = 'vehicules') {
      echo count($voitures) . " résultat(s) :";
    } 
    if (count($voitures) != 0) {
      foreach ($voitures as $row) {
        $id = $row->getId();
        $titre = $row->getTitre();
        $description = $row->getPetiteDescription();
        $img = 'public/assets/img/' . $row->getImage();
        $prix = number_format($row->getPrix(), 0, ',', ' ');
        include '../src/views/voitureCard.php';
      }
    } else {
      echo "Aucun résultat.";
    }
  }

  public function filtrerDate($date)
  {
    $page = 1;
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresAnnee($date, $page);
    $response = '';
    if (count($voitures) != 0) {
      if ($_GET['page'] = 'vehicules') {
        echo count($voitures) . " résultat(s) :";
      } 
      foreach ($voitures as $row) {
        $id = $row->getId();
        $titre = $row->getTitre();
        $description = $row->getPetiteDescription();
        $img = 'public/assets/img/' . $row->getImage();
        $prix = number_format($row->getPrix(), 0, ',', ' ');
        include '../src/views/voitureCard.php';
      }
    } else {
      echo "Aucun résultat.";
    }
  }

  public function ajouterVoiture($donnees)
  {
    $newVoiture = $donnees;
    $connection = new VoitureManager($this->db);
    $voiture = $connection->newVoiture($newVoiture);
  }
}
