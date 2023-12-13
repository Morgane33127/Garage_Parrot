<?php

class VoitureManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function newVoiture($donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    require_once 'VoitureInfos.php';

      $object = new VoitureInfos (0, $donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5], $donnees[6], $donnees[7], $donnees[8], $donnees[9], 0, $donnees[10], $donnees[11], $donnees[12], $donnees[13], $donnees[14], $donnees[15]);
      $insert = $this->pdo->prepare("INSERT INTO voitures (titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)  VALUES (?,?,?,?,?,?,?,?,?,?)");
      $insert->execute([$object->getTitre(), $object->getMarque(), $object->getModele(), $object->getPetiteDescription(), $object->getLargeDescription(), 
      $object->getPrix(),$object->getImage(),$object->getAnnee(),$object->getKilometre(), $object->getStatut()]);
      $id_i = $this->pdo->lastInsertId();
      $insertInfos = $this->pdo->prepare("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale)  VALUES (?,?,?,?,?,?,?)");
      $insertInfos->execute([$id_i, $object->getType(), $object->getCouleur(), $object->getNbPortes(), $object->getCarburant(), $object->getNbPlaces(), 
      $object->getPuissance()]);
  }

  public function affichageInfos(int $v_id): VoitureInfos
  {

    require_once 'VoitureInfos.php';
      $infos = $this->pdo->prepare('SELECT * FROM voitures LEFT JOIN infos_voiture ON id_v = id_i WHERE id_v= :id');
      $infos->setFetchMode(PDO::FETCH_CLASS, 'VoitureInfos');
      $infos->bindValue(':id', $v_id);
      $infos->execute();
      $voitures = $infos->fetchAll(PDO::FETCH_ASSOC);
      if (count($voitures) > 0) {
        foreach ($voitures as $value){
          $voituresAAfficher = new VoitureInfos ($value['id_v'], $value['titre_v'], $value['petite_description_v'], $value['large_description_v'], $value['marque'], 
          $value['modele'], $value['prix'], $value['img'], $value['annee'], $value['kilometre'], $value['statut'], $value['id_i'], $value['type'], $value['carburant'], 
          $value['couleur'], $value['nb_portes'],$value['nb_places'], $value['puissance_fiscale']);
        }
        return($voituresAAfficher);
      } else {
        throw new Exception('Aucune voiture correspondante.');
      }
  }

  public function affichageVoitures($limit, $offset): array
  {

    require_once 'Voiture.php';
      $infos = $this->pdo->prepare("SELECT * FROM voitures LIMIT :limit OFFSET :offset");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      $infos->bindValue(':limit', $limit, PDO::PARAM_INT);
      $infos->bindValue(':offset', $offset, PDO::PARAM_INT);
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

  public function getTotalVoitureCount() {

    $result = $this->pdo->query("SELECT COUNT(*) as total FROM voitures WHERE statut='Dispo'");
    return $result->fetch(PDO::FETCH_ASSOC)['total'];
}

  public function affichageVoituresAll(): array
  {

    require_once 'Voiture.php';
      $infos = $this->pdo->query("SELECT * FROM voitures");
      $infos->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
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

  public function updateVoiture($donnees)
  {
    require_once 'Voiture.php';
      $object = new VoitureInfos($donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5], $donnees[6], $donnees[7],$donnees[8],$donnees[9],$donnees[10],
      $donnees[11],$donnees[12],$donnees[13],$donnees[14],$donnees[15],$donnees[16],$donnees[17]);
      $updt = $this->pdo->prepare("UPDATE voitures SET titre_v =? ,marque = ?,modele = ?,petite_description_v = ?,large_description_v = ?,prix = ?,
      img = ?,annee = ?,kilometre = ?,statut=? WHERE id_v = ?");
            $updt->execute([$object->getTitre(), $object->getMarque(), $object->getModele(), $object->getPetiteDescription(), $object->getLargeDescription(), 
            $object->getPrix(),$object->getImage(),$object->getAnnee(),$object->getKilometre(), $object->getStatut(), $object->getId()]);
            
            $updtinfos = $this->pdo->prepare("UPDATE infos_voiture SET type = ?, couleur = ?, nb_portes = ?, carburant=?, nb_places = ?, puissance_fiscale = ? WHERE id_i = ?");
            $updtinfos->execute([$object->getType(), $object->getCouleur(), $object->getNbPortes(), $object->getCarburant(), $object->getNbPlaces(), $object->getPuissance(),$object->getId()]);

          }

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

  public function affichageVoituresPrix($prix, $page): array
  {
    require_once 'Voiture.php';
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
  }

  public function affichageVoituresKm($km, $page): array
  {
    require_once 'Voiture.php';
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
  }

  public function affichageVoituresAnnee($year, $page): array
  {
    require_once 'Voiture.php';

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

  }

  public function supprimerVoiture($id)
  {
  require_once 'Voiture.php';
      $img = $this->pdo->query("SELECT img FROM voitures WHERE id_v = $id")->fetch(PDO::FETCH_NUM);
      $img = $img[0];
      $supp = $this->pdo->prepare("DELETE FROM voitures WHERE id_v=?");
      $supp->execute([$id]);
      $suppinfos = $this->pdo->prepare("DELETE FROM infos_voiture WHERE id_i=?");
      $suppinfos->execute([$id]);
      if($img !== "gvplogo.svg"){
      unlink("./public/assets/img/$img");
      }
  } 
}
