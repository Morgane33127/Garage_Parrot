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

  public function supprimerPrestation($id)
  {

    require_once 'Prestation.php';
    try {
        $supp = $this->pdo->prepare("DELETE FROM prestations WHERE id_p=?");
        $supp->execute([$id]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function ajouterPrestation($object)
  {
    print_r($object);
    require_once 'Prestation.php';
    try {
        $add = $this->pdo->prepare("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) VALUES (?,?,?)");
        $add->execute([$object->getNom(), $object->getPetiteDescription(), $object->getLargeDescription()]);
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }



}
