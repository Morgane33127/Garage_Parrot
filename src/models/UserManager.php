<?php

/**
 * User Manager
 * 
 * To select, update, delete, add a user from database.
 */

class UserManager
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
   * To get the role of a user.
   *
   * @param string $id user's UUID
   * @return object User
   */
  public function role(string $id): User
  {
    require_once 'User.php';
    $role = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE id_u= :id');
    $role->setFetchMode(PDO::FETCH_CLASS, 'User');
    $role->bindValue(':id', $id);
    $role->execute();
    $personne = $role->fetch();
    if (count($personne) > 0) {
      return $personne;
    } else {
      throw new Exception('Affichage impossible.');
    }
  }

  /**
   * To display the user's informations
   *
   * @return array with user's data
   */
  public function affichageInfos(): array
  {
    require_once 'User.php';
    $user = $this->pdo->query('SELECT * FROM utilisateurs');
    $user->setFetchMode(PDO::FETCH_CLASS, 'User');
    $personne  = $user->fetchAll(PDO::FETCH_ASSOC);
    if (count($personne) > 0) {
      foreach ($personne as $value) {
        $personneAAfficher = new User($value['id_u'], $value['prenom_u'], $value['nom_u'], $value['role_u'], $value['login_u'], $value['mdp_u']);
        $personneTab[] = $personneAAfficher;
      }
      return ($personneTab);
    } else {
      throw new Exception('Affichage impossible');
    }
  }

  /**
   * To add a new user
   *
   * @param array with new user's data
   */
  public function newUser(array $donnees)
  {
    foreach ($donnees as $donnee) {
      verifData($donnee);
    }
    require_once 'User.php';
    $object = new User($donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5]);
    $insert = $this->pdo->prepare("INSERT INTO utilisateurs (id_u, prenom_u, nom_u, role_u, login_u, mdp_u) VALUES (?,?,?,?,?,?)");
    $insert->execute([$object->getId(), $object->getPrenom(), $object->getNom(), $object->getRole(), $object->getMail(), $object->getPassword()]);
  }

  /**
   * To delete a user
   *
   * @param string user's UUID
   */
  public function suppUser(string $id)
  {
    require_once 'User.php';
    $supp = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id_u=?");
    $supp->execute([$id]);
  }
}
