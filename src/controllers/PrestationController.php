<?php

/**
 * Controller for services
 *
 * @author Morgane G.
 */

class PrestationController
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
   * Obtain service details and display them in card form
   *
   */
  public function affichage()
  {

    $prestation = new PrestationManager($this->db);
    $prestation = $prestation->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $pteDescription = $row->getPetiteDescription();
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
      if($i >= 5){
        $icon = '';
      } else {
        $icon = $icons[$i];
      }
      include 'src/views/prestationCard.php';

      $i++;
    }
  }

  /**
   * Obtain service details and display them in list form
   *
   */
  public function affichageList()
  {

    $prestation = new PrestationManager($this->db);
    $prestation = $prestation->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $largeDescription = $row->getLargeDescription();
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
      if($i >= 5){
        $icon = '';
      } else {
        $icon = $icons[$i];
      }
      include 'src/views/prestationsList.php';

      $i++;
    }
  }

  /**
   * Obtain service details and display them in list form in admin space for modifications
   *
   */
  public function affichageListAdmin()
  {

    $prestation = new PrestationManager($this->db);
    $prestation = $prestation->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $largeDescription = $row->getLargeDescription();
      $petiteDescription = $row->getPetiteDescription();
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
      if($i >= 5){
        $icon = '';
      } else {
        $icon = $icons[$i];
      }
      include 'src/views/administration/prestationsListAdmin.php';

      $i++;
    }
  }

  /**
   * To add service(s) in admin space
   *
   * @param array $donnees
   */
  public function ajouterPrestation(array $donnees)
  {
    $connection = new PrestationManager($this->db);
    $prestation = $connection->ajouterPrestation($donnees);
  }
}
