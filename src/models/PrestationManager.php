<?php

/**
 * Service Manager
 * 
 * To select, update, delete data from database.
 */

class PrestationManager
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
   * To display services.
   *
   * @return array with services's data
   */
  public function affichageInfos(): array
  {

    require_once 'Prestation.php';
    $infos = $this->pdo->query('SELECT * FROM prestations');
    $infos->setFetchMode(PDO::FETCH_CLASS, 'Prestation');
    $prestations = $infos->fetchAll(PDO::FETCH_ASSOC);
    foreach ($prestations as $value) {
      $prestationAAfficher = new Prestation($value['id_p'], $value['nom_p'], $value['petite_description_p'], $value['large_description_p']);
      $prestationTab[] = $prestationAAfficher;
    }
    return ($prestationTab);
  }

  /**
   * To delete a service.
   *
   * @param int $id service's id
   */
  public function supprimerPrestation(int $id)
  {

    require_once 'Prestation.php';
    $supp = $this->pdo->prepare("DELETE FROM prestations WHERE id_p=?");
    $supp->execute([$id]);
  }

  /**
   * To add a service.
   *
   * @param array $donnees with new service's data
   */
  public function ajouterPrestation(array $donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    require_once 'Prestation.php';
    $object = new Prestation(0, $donnees[0], $donnees[1], $donnees[2]);
    $add = $this->pdo->prepare("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) VALUES (?,?,?)");
    $add->execute([$object->getNom(), $object->getPetiteDescription(), $object->getLargeDescription()]);
  }

  /**
   * To update a service.
   *
   * @param int $id service's id
   * @param string $petite_description_p with new service's data
   * @param string $large_description_p with new service's data
   */
  public function modifierPrestation(int $id, string $petite_description_p, string $large_description_p)
  {
    require_once 'Prestation.php';
    $upd = $this->pdo->prepare("UPDATE prestations SET petite_description_p = ?,  large_description_p = ? WHERE id_p = ?");
    $upd->execute([$petite_description_p, $large_description_p, $id]);
  }
}
