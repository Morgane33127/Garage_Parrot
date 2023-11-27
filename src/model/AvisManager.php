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
      $avis = $infos->fetchAll();
      return $avis;
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
      $avis = $infos->fetchAll();
      return $avis;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
