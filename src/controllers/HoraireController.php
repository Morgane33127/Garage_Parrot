<?php

class HoraireController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichageHeures()
  {

    // Obtenir les détails de les prestations
    $horaire = new HeureManager($this->db);
    $horaire = $horaire->affichageHoraires();

    foreach ($horaire as $row) {
      $jour = $row->getHeureLbl();
      $hr_debut = $row->getHeureDebut();
      $hr_fin = $row->getHeureFin();
      include 'src/views/horairesView.php'; // Afficher la vue de connexion

    }
  }

  public function affichageHeuresAdmin()
  {

    // Obtenir les détails de les prestations
    $horaire = new HeureManager($this->db);
    $horaire = $horaire->affichageHoraires();

    $k=1;
    foreach ($horaire as $row) {
      $jour = $row->getJourHeure();
      $hr_debut = $row->getHeureDebut();
      $hr_fin = $row->getHeureFin();
      include 'src/views/administration/horairesViewAdmin.php'; // Afficher la vue de connexion

   $k++; }
  }

}
