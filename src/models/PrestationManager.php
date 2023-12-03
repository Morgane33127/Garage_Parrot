<?php

class PrestationManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  public function affichageInfos(): array
  {

    require_once 'Prestation.php';
    try {
      $infos = $this->pdo->query('SELECT * FROM prestations');
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Prestation');
      $prestation = $infos->fetchAll();
      return $prestation;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
