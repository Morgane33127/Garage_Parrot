<?php

class VoitureManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function newVoiture($object)
  {

    require_once 'VoitureInfos.php';
    try {
      $insert = $this->pdo->prepare("INSERT INTO voitures (titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)  VALUES (?,?,?,?,?,?,?,?,?,?)");
      $insert->execute([$object->getTitre(), $object->getMarque(), $object->getModele(), $object->getPetiteDescription(), $object->getLargeDescription(), 
      $object->getPrix(),$object->getImage(),$object->getAnnee(),$object->getKilometre(), $object->getStatut()]);
      $id_i = $this->pdo->lastInsertId();
      $insertInfos = $this->pdo->prepare("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale)  VALUES (?,?,?,?,?,?,?)");
      $insertInfos->execute([$id_i, $object->getType(), $object->getCouleur(), $object->getNbPortes(), $object->getCarburant(), $object->getNbPlaces(), 
      $object->getPuissance()]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageInfos(int $v_id): VoitureInfos
  {

    require_once 'VoitureInfos.php';
    try {
      $infos = $this->pdo->prepare('SELECT * FROM voitures LEFT JOIN infos_voiture ON id_v = id_i WHERE id_v= :id');
      $infos->setFetchMode(PDO::FETCH_CLASS, 'VoitureInfos');
      $infos->bindValue(':id', $v_id);
      if ($infos->execute()) {
        $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
        foreach ($voitures as $value){
          $voituresAAfficher = new VoitureInfos ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
          $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut'], $value['id_i'], $value['type'], $value['carburant'], 
          $value['couleur'], $value['nb_portes'],$value['nb_places'], $value['puissance_fiscale']);
        }
        return($voituresAAfficher);
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
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function affichageVoituresAll(): array
  {

    require_once 'Voiture.php';
    try {
      $infos = $this->pdo->query("SELECT * FROM voitures");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
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
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
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
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
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
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
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
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function supprimerVoiture($id)
  {
  require_once 'Voiture.php';
  try {
      $supp = $this->pdo->prepare("DELETE FROM voitures WHERE id_v=?");
      $supp->execute([$id]);
      $suppinfos = $this->pdo->prepare("DELETE FROM infos_voiture WHERE id_i=?");
      $suppinfos->execute([$id]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
}
