<?php

/**
 * Controller for hours
 *
 * @author Morgane G.
 */

class HoraireController
{

  private $db;

  /**
   * Constructor
   *
   */
  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  /**
   * Display hours
   * 
   */
  public function affichageHeures()
  {

    $horaire = new HeureManager($this->db);
    $horaire = $horaire->affichageHoraires();

    foreach ($horaire as $row) {
      $jour = $row->getHeureLbl();
      $hr_debut = $row->getHeureDebut();
      $hr_fin = $row->getHeureFin();
      include 'src/views/horairesView.php';
    }
  }

  /**
   * Specific view and fonctionnalities for admin space
   * 
   */
  public function affichageHeuresAdmin()
  {

    $horaire = new HeureManager($this->db);
    $horaire = $horaire->affichageHoraires();

    $k = 1;
    foreach ($horaire as $row) {
      $jour = $row->getJourHeure();
      $hr_debut = $row->getHeureDebut();
      $hr_fin = $row->getHeureFin();
      include 'src/views/administration/horairesViewAdmin.php';
      $k++;
    }
  }

  /**
   * Function to change hours in admin space
   * 
   * @param array $modifications
   */
  public function changeHoraires(array $modifications)
  {
    $connection = new HeureManager($this->db);
    $heure = $connection->changeHoraires($modifications);
  }
}
