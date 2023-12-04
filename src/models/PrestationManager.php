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
      $prestations = $infos->fetchAll(PDO::FETCH_ASSOC);
      foreach ($prestations as $value){
        $prestationAAfficher = new Prestation ($value['id_p'], $value['nom_p'], $value['petite_description_p'], $value['large_description_p']);
        $prestationTab[]=$prestationAAfficher;
      }
      return($prestationTab);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
