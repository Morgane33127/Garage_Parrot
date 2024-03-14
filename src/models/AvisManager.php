<?php

/**
 * Notice Manager
 * 
 * To select, update, delete data from database.
 */

class AvisManager
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
   * To display notices with pagination.
   *
   * @param int $limit maximum number of results
   * @param int $offset gap
   * @return array with notices's data
   */
  public function affichageAvis(int $limit, int $offset): array
  {

    $infos = $this->pdo->prepare("SELECT * FROM avis WHERE statut='Valide' ORDER BY dt_a DESC LIMIT :limit OFFSET :offset");
    $infos->bindValue(':limit', $limit, PDO::PARAM_INT);
    $infos->bindValue(':offset', $offset, PDO::PARAM_INT);
    $infos->execute();
    $avis = $infos->fetchAll(PDO::FETCH_ASSOC);
    if (count($avis) > 0) {
      foreach ($avis as $value) {
        $avisAAfficher = new Avis(
          $value['id_a'],
          $value['titre_a'],
          $value['commentaire_a'],
          $value['visiteur_nom'],
          $value['visiteur_prenom'],
          $value['note_a'],
          $value['statut'],
          $value['dt_a']
        );
        $avisTab[] = $avisAAfficher;
      }
      return ($avisTab);
    } else {
      $avisTab = array();
      return ($avisTab);
    }
  }

  /**
   * To count the total reviews
   *
   * @return string total
   */
  public function getTotalAvisCount()
  {

    $result = $this->pdo->query("SELECT COUNT(*) as total FROM avis WHERE statut='Valide'");
    return $result->fetch(PDO::FETCH_ASSOC)['total'];
  }

  /**
   * To display the list of reviews awaiting verification
   *
   * @return array with notices's data
   */
  public function avisAValider(): array
  {

    $infos = $this->pdo->query("SELECT * FROM avis WHERE statut='En attente' ORDER BY dt_a ASC");
    $avis = $infos->fetchAll(PDO::FETCH_ASSOC);
    if (count($avis) > 0) {
      foreach ($avis as $value) {
        $avisAAfficher = new Avis(
          $value['id_a'],
          $value['titre_a'],
          $value['commentaire_a'],
          $value['visiteur_nom'],
          $value['visiteur_prenom'],
          $value['note_a'],
          $value['statut'],
          $value['dt_a']
        );
        $avisTab[] = $avisAAfficher;
      }
      return ($avisTab);
    } else {
      $avisTab = array();
      return ($avisTab);
    }
  }

  /**
   * To add a new notice
   *
   * @param array $donnees with notice's data
   */
  public function newAvis($donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    $object = new Avis(0, $donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], 'En attente', '');
    $insert = $this->pdo->prepare("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) VALUES (?,?,?,?,?,?)");
    $insert->execute([
      $object->getTitre(), $object->getCommentaire(), $object->getVisiteurNom(), $object->getVisiteurPrenom(),
      $object->getNote(), $object->getStatut()
    ]);

    if(isset($_SESSION['id'])){
      $event = $this->eventTable($_SESSION['id'], 'Ajout avis');
    } else {
      $event = $this->eventTable(0, 'Ajout avis');
    }
  }

  /**
   * To validate a new notice
   *
   * @param int $id notice's id
   */
  public function validAvis($id)
  {
    $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
    $valid->execute(['Valide', $id]);
      $event = $this->eventTable($_SESSION['id'], 'Valide avis');
    
  }

  /**
   * To denied a new notice
   *
   * @param int $id notice's id
   */
  public function invalidAvis($id)
  {
    $valid = $this->pdo->prepare("UPDATE avis SET statut=? WHERE id_a=?");
    $valid->execute(['Invalide', $id]);
    $event = $this->eventTable($_SESSION['id'], 'Invalide avis');
  }

  /**
   * To insert event in db
   *
   * @param string $id_u,
   * @param string $info_e
   *
   */
  public function eventTable(string $id_u, string $info_e)
  {
    $event = $this->pdo->prepare("INSERT INTO evenements (id_u, ip, info_e) VALUES (:id_u, :ip, :info_e)");
    $event->bindValue(':id_u', $id_u);
    $event->bindValue(':ip', getIp());
    $event->bindValue(':info_e', $info_e);
    $event->execute();
  }
}
