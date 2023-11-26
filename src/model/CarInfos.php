<?php

class CarInfos
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  public function affichageInfos(int $v_id): Car
  {

    require_once 'Car.php';
    try {
      $infos = $this->pdo->prepare('SELECT * FROM voitures LEFT JOIN infos_voiture ON id_v = id_i
      WHERE id_v= :id');
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Car');
      $infos->bindValue(':id', $v_id);
      if ($infos->execute()) {
        $voiture = $infos->fetch();
        return $voiture;
      } else {
        throw new Exception('Affichage impossible');
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoitures($limit): array
  {

    require_once 'Car.php';
    try {
      $infos = $this->pdo->query("SELECT * FROM voitures LIMIT $limit");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Car');
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
