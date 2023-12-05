<?php

class AvisManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function affichageAvis(): array
  {

    require_once 'Avis.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM avis WHERE statut='Valide' ORDER BY dt_a DESC");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Avis');
      //$infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $avis = $infos->fetchAll(PDO :: FETCH_ASSOC);
      if(count($avis)>0){
      foreach ($avis as $value){
        $avisAAfficher = new Avis ($value['id_a'], $value['titre_a'], $value['commentaire_a'], $value['visiteur_nom'], $value['visiteur_prenom'], $value['note_a'], $value['statut'], $value['dt_a']);
        $avisTab[]=$avisAAfficher;
      }
      return($avisTab);
    }else {
      $avisTab=array();
      return($avisTab);
    }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  public function avisAValider(): array
  {

    require_once 'Avis.php';
    try {
      $infos = $this->pdo->query("SELECT * FROM avis WHERE statut='En attente' ORDER BY dt_a ASC");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Avis');
      $avis = $infos->fetchAll(PDO :: FETCH_ASSOC);
      if(count($avis)>0){
      foreach ($avis as $value){
        $avisAAfficher = new Avis ($value['id_a'], $value['titre_a'], $value['commentaire_a'], $value['visiteur_nom'], $value['visiteur_prenom'], $value['note_a'], $value['statut'], $value['dt_a']);
        $avisTab[]=$avisAAfficher;
      }
      return($avisTab);
    } else {
      $avisTab=array();
      return($avisTab);
    }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function newAvis($object)
  {
    require_once 'Avis.php';
    try {
      $insert = $this->pdo->prepare("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) VALUES (?,?,?,?,?,?)");
      $insert->execute([$object->getTitre(), $object->getCommentaire(), $object->getVisiteurNom(), $object->getVisiteurPrenom(), 
      $object->getNote(), $object->getStatut()]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function validAvis($id)
  {
    require_once 'Avis.php';
    try {
      $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
      $valid->execute(['Valide', $id]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function invalidAvis($id)
  {
    require_once 'Avis.php';
    try {
      $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
      $valid->execute(['Invalide', $id]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


}
