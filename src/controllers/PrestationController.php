<?php

class PrestationController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichage()
  {

    // Obtenir les détails de les prestations
    $prestation = new PrestationManager($this->db);
    $prestation = $prestation->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $pteDescription = $row->getPetiteDescription();
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
      include 'src/views/prestationCard.php'; // Afficher la vue de connexion

      $i++;
    }
  }

  public function affichageList()
  {

    // Obtenir les détails de les prestations
    $prestation = new PrestationManager($this->db);
    $prestation = $prestation->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $largeDescription = $row->getLargeDescription();
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
      include 'src/views/prestationsList.php'; // Afficher la vue de connexion

      $i++;
    }
  }
}
