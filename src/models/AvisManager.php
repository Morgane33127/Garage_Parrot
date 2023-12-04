<?php

class AvisManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function affichageAvis($page): array
  {

    require_once 'Avis.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM avis WHERE statut='Valide' ORDER BY dt_a DESC LIMIT :start, 9");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Avis');
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $avis = $infos->fetchAll(PDO :: FETCH_ASSOC);
      foreach ($avis as $value){
        $avisAAfficher = new Avis ($value['id_a'], $value['titre_a'], $value['commentaire_a'], $value['dt_a'], $value['visiteur_nom'], $value['visiteur_prenom'], $value['note_a'], $value['statut']);
        $avisTab[]=$avisAAfficher;
      }
      return($avisTab);
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
      foreach ($avis as $value){
        $avisAAfficher = new Avis ($value['id_a'], $value['titre_a'], $value['commentaire_a'], $value['dt_a'], $value['visiteur_nom'], $value['visiteur_prenom'], $value['note_a'], $value['statut']);
        $avisTab[]=$avisAAfficher;
      }
      return($avisTab);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function newAvis($titre, $commentaire, $nom, $prenom, $note)
  {
    require_once 'Avis.php';
    try {
      $insert = $this->pdo->prepare("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) VALUES (?,?,?,?,?,?)");
      $insert->execute([$titre, $commentaire, $nom, $prenom, $note, 'En attente']);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
