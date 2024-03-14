<?php

/**
 * Controller for notices
 *
 * @author Morgane G.
 */

class AvisController
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
   * Function to count the number of notices validate
   *
   */
  public function countAvis()
  {
    $model = new AvisManager($this->db);
    echo $totalCount = $model->getTotalAvisCount();
  }

  /**
   * Display notices with pagination
   * 
   *@param int $page
   *@param int $limit
   */
  public function affichage(int $page, int $limit)
  {
    $offset = ($page - 1) * $limit;
    $model = new AvisManager($this->db);
    $avis = $model->affichageAvis($limit, $offset);
    $totalCount = $model->getTotalAvisCount();
    if (!empty($avis)) {
      foreach ($avis as $row) {
        $titre = $row->getTitre();
        $comment = $row->getCommentaire();
        $dt = $row->getDate();
        $visiteur = $row->getInfosVisiteur();
        $note = $row->getNote();
        $star = str_repeat('&#x2605;', $note);
        //Display the view
        include 'src/views/avisCard.php';
      }
      if (isset($_GET['page']) && $_GET['page'] == 'avis') {
        //Display the pagination if the page select is "Avis"
        include 'src/views/pagination.php';
      }
    } else {
      echo "Aucun résultat";
    }
  }

    /**
   * Display notices with carousel
   * 
   *@param int $page
   *@param int $limit
   */
  public function affichageCarousel(int $page, int $limit)
  {
    $offset = ($page - 1) * $limit;
    $model = new AvisManager($this->db);
    $avis = $model->affichageAvis($limit, $offset);
    $totalCount = $model->getTotalAvisCount();
    if (!empty($avis)) {
      $k=1;
      foreach ($avis as $row) {

        $titre = $row->getTitre();
        $comment = $row->getCommentaire();
        $dt = $row->getDate();
        $visiteur = $row->getInfosVisiteur();
        $note = $row->getNote();
        $star = str_repeat('&#x2605;', $note);
        //Display the view
        include 'src/views/avisCardCarousel.php';
        $k++;

      }
    } else {
      echo "Aucun résultat";
    }
  }

  /**
   * Specific display of notices for admin space : just "En attente"
   * 
   */
  public function affichageAdmin()
  {
    $avis = new AvisManager($this->db);
    $avis = $avis->avisAValider();
    if (!empty($avis)) {
      foreach ($avis as $row) {
        $titre = $row->getTitre();
        $comment = $row->getCommentaire();
        $dt = $row->getDate();
        $visiteur = $row->getInfosVisiteur();
        $note = $row->getNote();
        $star = str_repeat('&#x2605;', $note);
        // Display the view
        include 'src/views/administration/avisCardAdmin.php';
      }
    } else {
      echo "Aucun résultat";
    }
  }

  /**
   * Add a new notices
   * @param array $donnees, notices'informations
   * 
   */
  public function ajouterAvis(array $donnees)
  {
    $newavis = $donnees;
    $connection = new AvisManager($this->db);
    $avis = $connection->newAvis($newavis);
  }
}
