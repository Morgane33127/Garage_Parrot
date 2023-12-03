<?php

class VoitureManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  public function affichageInfos(int $v_id): Voiture
  {

    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->prepare('SELECT * FROM voitures LEFT JOIN infos_voiture ON id_v = id_i WHERE id_v= :id');
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
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

    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->query("SELECT * FROM voitures LIMIT $limit");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoitures2($page): array
  {

    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM voitures LIMIT :start, 10");
      // On récupère les messages sous forme d'objets Voiture
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      // La position de départ du LIMIT dépend de la page. Attention au type de données, qui doit être en PARAM_INT
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoituresPrix($prix, $page): array
  {
    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM voitures WHERE prix <= :prix ORDER BY prix ASC LIMIT :start, 10");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $infos->bindValue(':prix', $prix, PDO::PARAM_INT);
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoituresKm($km, $page): array
  {
    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM voitures WHERE kilometre <= :km ORDER BY kilometre ASC LIMIT :start, 10");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $infos->bindValue(':km', $km, PDO::PARAM_INT);
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoituresAnnee($year, $page): array
  {
    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->prepare("SELECT * FROM voitures WHERE annee <= :annee ORDER BY annee DESC LIMIT :start, 10");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $infos->bindValue(':annee', $year, PDO::PARAM_STR);
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $voitures = $infos->fetchAll();
      return $voitures;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
