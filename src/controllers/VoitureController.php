<?php

class VoitureController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichageCard()
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoitures(2);
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = '../public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      include 'src/views/voitureCard.php'; // Afficher la vue voiture
    }
  }

  public function affichageCardFilter($filter, $page)
  {
    switch ($filter) {
      case 'prix':
        $voiture = new VoitureManager($this->db);
        $voitures = $voiture->affichageVoituresPrix($prix, $page);
        foreach ($voitures as $row) {
          $id = $row->getId();
          $titre = $row->getTitre();
          $description = $row->getPetiteDescription();
          $img = '../public/assets/img/' . $row->getImage();
          $prix = number_format($row->getPrix(), 0, ',', ' ');
          include 'src/views/voitureCard.php'; // Afficher la vue voiture
        }
        break;
      case '':
        $voiture = new VoitureManager($this->db);
        $voitures = $voiture->affichageVoituresPrix($prix, $page);
        foreach ($voitures as $row) {
          $id = $row->getId();
          $titre = $row->getTitre();
          $description = $row->getPetiteDescription();
          $img = '../public/assets/img/' . $row->getImage();
          $prix = number_format($row->getPrix(), 0, ',', ' ');
          include 'src/views/voitureCard.php'; // Afficher la vue voiture
        }
    }
  }
}
