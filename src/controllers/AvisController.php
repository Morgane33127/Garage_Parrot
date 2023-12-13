<?php

class AvisController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichage($page, $limit)
  {
    $offset = ($page - 1) * $limit;
    // Obtenir les détails de les avis
    $model = new AvisManager($this->db);
    $avis = $model ->affichageAvis($limit, $offset);
    $totalCount = $model ->getTotalAvisCount();
    if(!empty($avis)){
    foreach ($avis as $row) {
      $titre = $row->getTitre();
      $comment = $row->getCommentaire();
      $dt = $row->getDate();
      $visiteur = $row->getInfosVisiteur();
      $note = $row->getNote();
      $star = str_repeat('&#x2605;', $note);
      include 'src/views/avisCard.php'; // Afficher la vue

    }
    if(isset($_GET['page']) && $_GET['page']=='avis'){
      include 'src/views/pagination.php'; // Afficher la pagination
    }
  }
    
    else {
      echo "Aucun résultat";
    }
  }

  public function affichageAdmin()
  {

    // Obtenir les détails de les avis
    $avis = new AvisManager($this->db);
    $avis = $avis->avisAValider();
    if(!empty($avis)){
    foreach ($avis as $row) {
      $titre = $row->getTitre();
      $comment = $row->getCommentaire();
      $dt = $row->getDate();
      $visiteur = $row->getInfosVisiteur();
      $note = $row->getNote();
      $star = str_repeat('&#x2605;', $note);
      include 'src/views/administration/avisCardAdmin.php'; // Afficher la vue
    } 
    }else {
      echo "Aucun résultat";
    }
  }

  public function ajouterAvis($donnees)
  {
    $newavis = $donnees;
    $connection = new AvisManager($this->db);
    $avis = $connection->newAvis($newavis);
  }

}
