<?php

class AvisManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function affichageAvis($limit): array
  {

    require_once 'Avis.php';
    try {
      $infos = $this->pdo->query("SELECT * FROM avis ORDER BY dt_a DESC LIMIT $limit ");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Avis');
      $avis = $infos->fetchAll();
      return $avis;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
