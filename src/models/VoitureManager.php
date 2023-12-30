<?php

/**
 * Car Manager
 * 
 * To select, update, delete, add a car from database.
 */

class VoitureManager
{

  private PDO $pdo;

  /**
   * Constructor
   *
   */
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * To add a new car
   *
   * @param array with new car's data
   */
  public function newVoiture(array $donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    require_once 'VoitureInfos.php';

    $object = new VoitureInfos(0, $donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5], $donnees[6], 
    $donnees[7], $donnees[8], $donnees[9], 0, $donnees[10], $donnees[11], $donnees[12], $donnees[13], $donnees[14], $donnees[15]);
    $insert = $this->pdo->prepare("INSERT INTO voitures (titre_v,marque,modele,petite_description_v,large_description_v,prix,
    img,annee,kilometre,statut)  VALUES (?,?,?,?,?,?,?,?,?,?)");
    $insert->execute([
      $object->getTitre(), $object->getMarque(), $object->getModele(), $object->getPetiteDescription(), $object->getLargeDescription(),
      $object->getPrix(), $object->getImage(), $object->getAnnee(), $object->getKilometre(), $object->getStatut()
    ]);
    $id_i = $this->pdo->lastInsertId();
    $insertInfos = $this->pdo->prepare("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
    VALUES (?,?,?,?,?,?,?)");
    $insertInfos->execute([
      $id_i, $object->getType(), $object->getCouleur(), $object->getNbPortes(), $object->getCarburant(), $object->getNbPlaces(),
      $object->getPuissance()
    ]);
  }

  /**
   * To display the car's informations
   *
   * @param int $v_id car's id
   * @return object VoitureInfos with car's data
   */
  public function affichageInfos(int $v_id): VoitureInfos
  {
    require_once 'VoitureInfos.php';
    $infos = $this->pdo->prepare('SELECT * FROM voitures LEFT JOIN infos_voiture ON id_v = id_i WHERE id_v= :id');
    $infos->setFetchMode(PDO::FETCH_CLASS, 'VoitureInfos');
    $infos->bindValue(':id', $v_id);
    $infos->execute();
    $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
    if (count($voitures) > 0) {
      foreach ($voitures as $value) {
        $voituresAAfficher = new VoitureInfos(
          $value['id_v'],
          $value['titre_v'],
          $value['petite_description_v'],
          $value['large_description_v'],
          $value['marque'],
          $value['modele'],
          $value['prix'],
          $value['img'],
          $value['annee'],
          $value['kilometre'],
          $value['statut'],
          $value['id_i'],
          $value['type'],
          $value['carburant'],
          $value['couleur'],
          $value['nb_portes'],
          $value['nb_places'],
          $value['puissance_fiscale']
        );
      }
      return ($voituresAAfficher);
    } else {
      throw new Exception('Aucune voiture correspondante.');
    }
  }

  /**
   * To display the car available with pagination
   *
   * @param int $limit maximum number of results
   * @param int $offset gap
   * @return array with cars's data
   */
  public function affichageVoitures(int $limit, int $offset): array
  {
    require_once 'Voiture.php';
    $infos = $this->pdo->prepare("SELECT * FROM voitures LIMIT :limit OFFSET :offset");
    $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $infos->bindValue(':limit', $limit, PDO::PARAM_INT);
    $infos->bindValue(':offset', $offset, PDO::PARAM_INT);
    $infos->execute();
    $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
    if (count($voitures) > 0) {
      $voituresTab = array();
      foreach ($voitures as $value) {
        $voituresAAfficher = new Voiture(
          $value['id_v'],
          $value['titre_v'],
          $value['petite_description_v'],
          $value['large_description_v'],
          $value['marque'],
          $value['modele'],
          $value['prix'],
          $value['img'],
          $value['annee'],
          $value['kilometre'],
          $value['statut']
        );
        $voituresTab[] = $voituresAAfficher;
      }
      return ($voituresTab);
    } else {
      throw new Exception('Aucune voiture correspondante.');
    }
  }

  /**
   * To count the total car available
   *
   * @return string total
   */
  public function getTotalVoitureCount()
  {
    $result = $this->pdo->query("SELECT COUNT(*) as total FROM voitures WHERE statut='Dispo'");
    return $result->fetch(PDO::FETCH_ASSOC)['total'];
  }

  /**
   * To display the car available without pagination
   *
   * @return array with cars's data
   */
  public function affichageVoituresAll(): array
  {
    require_once 'Voiture.php';
    $infos = $this->pdo->query("SELECT * FROM voitures");
    $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
    if (count($voitures) > 0) {
      $voituresTab = array();
      foreach ($voitures as $value) {
        $voituresAAfficher = new Voiture(
          $value['id_v'],
          $value['titre_v'],
          $value['petite_description_v'],
          $value['large_description_v'],
          $value['marque'],
          $value['modele'],
          $value['prix'],
          $value['img'],
          $value['annee'],
          $value['kilometre'],
          $value['statut']
        );
        $voituresTab[] = $voituresAAfficher;
      }
      return ($voituresTab);
    } else {
      throw new Exception('Aucune voiture correspondante.');
    }
  }

  /**
   * To update a car
   *
   * @param array $donnees with car's data
   */
  public function updateVoiture(array $donnees)
  {
    require_once 'Voiture.php';
    $object = new VoitureInfos(
      $donnees[0],
      $donnees[1],
      $donnees[2],
      $donnees[3],
      $donnees[4],
      $donnees[5],
      $donnees[6],
      $donnees[7],
      $donnees[8],
      $donnees[9],
      $donnees[10],
      $donnees[11],
      $donnees[12],
      $donnees[13],
      $donnees[14],
      $donnees[15],
      $donnees[16],
      $donnees[17]
    );
    $updt = $this->pdo->prepare("UPDATE voitures SET titre_v =? ,marque = ?,modele = ?,petite_description_v = ?,large_description_v = ?,prix = ?,
      img = ?,annee = ?,kilometre = ?,statut=? WHERE id_v = ?");
    $updt->execute([
      $object->getTitre(), $object->getMarque(), $object->getModele(), $object->getPetiteDescription(), $object->getLargeDescription(),
      $object->getPrix(), $object->getImage(), $object->getAnnee(), $object->getKilometre(), $object->getStatut(), $object->getId()
    ]);

    $updtinfos = $this->pdo->prepare("UPDATE infos_voiture SET type = ?, couleur = ?, nb_portes = ?, carburant=?, nb_places = ?, 
    puissance_fiscale = ? WHERE id_i = ?");
    $updtinfos->execute([$object->getType(), $object->getCouleur(), $object->getNbPortes(), $object->getCarburant(), $object->getNbPlaces(), 
    $object->getPuissance(), $object->getId()]);
  }

  /*
  public function affichageVoitures2($page): array
  {

    require_once 'Voiture.php';

      $infos = $this->pdo->prepare("SELECT * FROM voitures LIMIT :start, 10");
      // On récupère les messages sous forme d'objets Voiture
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      // La position de départ du LIMIT dépend de la page. Attention au type de données, qui doit être en PARAM_INT
      $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
      $infos->execute();
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      if (count($voitures) > 0) {
      $voituresTab=array();
      foreach ($voitures as $value){
        $voituresAAfficher = new Voiture ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
        $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut']);
        $voituresTab[]=$voituresAAfficher;
      }
      return($voituresTab);
    } else {
      throw new Exception('Aucune voiture correspondante.');
    }

  }
  */

  /**
   * To delete a car
   *
   * @param int car's ID
   */
  public function supprimerVoiture(int $id)
  {
    require_once 'Voiture.php';
    $img = $this->pdo->query("SELECT img FROM voitures WHERE id_v = $id")->fetch(PDO::FETCH_NUM);
    $img = $img[0];
    $supp = $this->pdo->prepare("DELETE FROM voitures WHERE id_v=?");
    $supp->execute([$id]);
    $suppinfos = $this->pdo->prepare("DELETE FROM infos_voiture WHERE id_i=?");
    $suppinfos->execute([$id]);
    if ($img !== "gvplogo.svg") {
      unlink("./public/assets/img/$img");
    }
  }

  /**
   * Function associated with fetch JS to display a filtered view of cars for sale.
   *
   * @param int $prixSaisi
   * @param int $kmSaisi
   * @param string $dateSaisi
   * @param int $page
   * @return array with car list
   */
  public function affichageVoituresFiltre(int $prixSaisi, int $kmSaisi, string $dateSaisi, int $page): array
  {
    require_once 'Voiture.php';
    $infos = $this->pdo->prepare("SELECT * FROM voitures WHERE kilometre <= :km AND prix <= :prix AND annee <= :annee ORDER BY prix ASC LIMIT :start, 10");
    $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $infos->bindValue(':km', $kmSaisi, PDO::PARAM_INT);
    $infos->bindValue(':annee', $dateSaisi, PDO::PARAM_STR);
    $infos->bindValue(':prix', $prixSaisi, PDO::PARAM_INT);
    $infos->bindValue(':start', 10 * ($page - 1), PDO::PARAM_INT);
    $infos->execute();
    $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
    $voituresTab = array();
    foreach ($voitures as $value) {
      $voituresAAfficher = new Voiture(
        $value['id_v'],
        $value['titre_v'],
        $value['petite_description_v'],
        $value['large_description_v'],
        $value['marque'],
        $value['modele'],
        $value['prix'],
        $value['img'],
        $value['annee'],
        $value['kilometre'],
        $value['statut']
      );
      $voituresTab[] = $voituresAAfficher;
    }
    return ($voituresTab);
  }
}
