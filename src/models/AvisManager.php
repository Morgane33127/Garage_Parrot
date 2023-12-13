<?php

class AvisManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  public function affichageAvis($limit, $offset): array
  {

    require_once 'Avis.php';
      $infos = $this->pdo->prepare("SELECT * FROM avis WHERE statut='Valide' ORDER BY dt_a DESC LIMIT :limit OFFSET :offset");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Avis');
      $infos->bindValue(':limit', $limit, PDO::PARAM_INT);
      $infos->bindValue(':offset', $offset, PDO::PARAM_INT);
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
  }

  public function getTotalAvisCount() {

    // Exécution de la requête pour compter le total des avis
    $result = $this->pdo->query("SELECT COUNT(*) as total FROM avis WHERE statut='Valide'");
    return $result->fetch(PDO::FETCH_ASSOC)['total'];
}

  public function affichageAvisCopie(): array
  {

    require_once 'Avis.php';
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
  }


  public function avisAValider(): array
  {

    require_once 'Avis.php';
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
  }

  public function newAvis($donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    require_once 'Avis.php';
      $object = new Avis(0, $donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], 'En attente', '');
      $insert = $this->pdo->prepare("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) VALUES (?,?,?,?,?,?)");
      $insert->execute([$object->getTitre(), $object->getCommentaire(), $object->getVisiteurNom(), $object->getVisiteurPrenom(), 
      $object->getNote(), $object->getStatut()]);
  }

  public function validAvis($id)
  {
    require_once 'Avis.php';
      $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
      $valid->execute(['Valide', $id]);
  }

  public function invalidAvis($id)
  {
    require_once 'Avis.php';
      $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
      $valid->execute(['Invalide', $id]);

  }

}
