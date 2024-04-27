<?php

/**
 * Controller for car management
 *
 * @author Morgane G.
 */

class VoitureController
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
   * To obtain the number of cars available for sale.
   *
   */
  public function countVoiture()
  {

    $model = new VoitureManager($this->db);
    echo $totalCount = $model->getTotalVoitureCount();
  }

  /**
   * Obtain cars shorts details and display them in card form.
   *
   * @param int $page for pagination
   * @param int $limit for pagination
   */
  public function affichageCard(int $page, int $limit)
  {
    $offset = ($page - 1) * $limit;
    $model = new VoitureManager($this->db);
    $voitures = $model->affichageVoitures($limit, $offset);
    $totalCount = $model->getTotalVoitureCount();
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = BASE_URL . '/public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      $kilometre = number_format($row->getKilometre(), 0, ',', ' ');
      include 'src/views/voitureCard.php';
    }
    if (isset($_GET['page']) && $_GET['page'] == 'vehicules') {
      //Show pagination
      include 'src/views/pagination.php';
    }
  }

  /**
   * Obtain cars shorts details and display them in card form for space admin.
   *
   */
  public function affichageAll()
  {

    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresAll();
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = BASE_URL . '/public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      $kilometre = number_format($row->getKilometre(), 0, ',', ' ');
      $statut = $row->getStatut();
      if($statut === 'Dispo'){
        $badge = 'success';
      } else {
        $badge = 'warning';
      }
      include 'src/views/administration/voitureCardAdmin.php';
    }
  }

  /**
   * Displays the page with detailed information about a car using its ID.
   *
   * @param int $id
   */
  public function voitureInfos(array $id)
  {
    $id = $id[0];
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
    ob_start();
    $horaireController = new HoraireController();
    $horaireController->affichageHeures();
    $horaires = ob_get_clean();
    include 'src/views/voitureInfos.php';
  }

  /**
   * Displays the page with detailed information about a car using its ID for admin space.
   *
   * @param int $id
   */
  public function voitureInfosAdmin(array $id)
  {
    $id = $id[0];
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
    include 'src/views/administration/voitureInfosAdmin.php';
  }

  /**
   * To update a car informations
   *
   * @param array $donnees
   */
  public function modifierVoiture(array $donnees)
  {

    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->updateVoiture($donnees);
  }

  /**
   * To add a car with informations
   *
   * @param array $donnees
   */
  public function ajouterVoiture(array $donnees)
  {
    $newVoiture = $donnees;
    $connection = new VoitureManager($this->db);
    $voiture = $connection->newVoiture($newVoiture);
  }

  /**
   * Function associated with fetch JS to display a filtered view of cars for sale.
   *
   * @param int $prixMin
   * @param int $prixMax
   * @param int $kmMin
   * @param int $kmMax
   * @param string $dateSaisi
   */
  public function filtrerVoitures(int $prixMin, int $prixMax, int $kmMin, int $kmMax, string $dateSaisi)
  {
    $page = 1;
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresFiltre($prixMin, $prixMax, $kmMin, $kmMax, $dateSaisi, $page);
    $response = '';
    if (count($voitures) != 0) {
      $nbResult = count($voitures);
      if (str_contains($_SERVER['REQUEST_URI'], BASE_URL.'/src')) {
        echo $nbResult . " résultat(s) :";
      }
      echo '<div class="row align-items-center">';
      foreach ($voitures as $row) {
        $id = $row->getId();
        $titre = $row->getTitre();
        $description = $row->getPetiteDescription();
        $img = BASE_URL . '/public/assets/img/' . $row->getImage();
        $prix = number_format($row->getPrix(), 0, ',', ' ');
        $kilometre = number_format($row->getKilometre(), 0, ',', ' ');

        include '../src/views/voitureCard.php';

      }
      echo '</div>';
    } else {
      echo "Aucun résultat.";
    }
  }
}
