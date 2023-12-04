<?php

class AvisController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichage()
  {

    // Obtenir les détails de les avis
    $avis = new AvisManager($this->db);
    $avis = $avis->affichageAvis(1);

    foreach ($avis as $row) {
      $titre = $row->getTitre();
      $comment = $row->getCommentaire();
      $dt = $row->getDate();
      $visiteur = $row->getInfosVisiteur();
      $note = $row->getNote();
      $star = str_repeat('&#x2605;', $note);
      include 'src/views/avisCard.php'; // Afficher la vue

    }
  }

  public function affichageAdmin()
  {

    // Obtenir les détails de les avis
    $avis = new AvisManager($this->db);
    $avis = $avis->affichageAvis(1);

    foreach ($avis as $row) {
      $titre = $row->getTitre();
      $comment = $row->getCommentaire();
      $dt = $row->getDate();
      $visiteur = $row->getInfosVisiteur();
      $note = $row->getNote();
      $star = str_repeat('&#x2605;', $note);
      include 'src/views/avisCardAdmin.php'; // Afficher la vue

    }
  }

}
