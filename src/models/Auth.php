<?php

/**
 * Class for authentification to admin space
 *
 * @author Morgane G.
 */

class Auth
{
  private $conn;

  /**
   * Constructor
   *
   */
  public function __construct($db)
  {
    $this->conn = $db;
  }

  /**
   * Verifications of email and password to enter to the administration area.
   * 
   * @param string $mdp password
   * @param string $login email
   * @return object User
   * @access public
   */
  public function login(string $mdp, string $login): User
  {
    require_once 'User.php';

    $stmt = $this->conn->prepare('SELECT * FROM utilisateurs WHERE login_u= :email');
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $stmt->bindValue(':email', $login);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($user) > 0) {
      $newUser = new User($user[0]['id_u'], $user[0]['prenom_u'], $user[0]['nom_u'], $user[0]['role_u'], $user[0]['login_u'], $user[0]['mdp_u']);
      $id_u = $newUser->getId();
      if (!empty($newUser) && password_verify($mdp, $newUser->getPassword()) == true) {
        $event = $this->conn->prepare('INSERT INTO evenements (id_u, info_e) VALUES (:id_u, :info_e)');
        $event->bindValue(':id_u', $id_u);
        $event->bindValue('info_e', 'Nouvelle connexion');
        $event->execute();
        return ($newUser);
      } else {
        throw new Exception('Mot de passe incorrect.');
      }
    } else {
      throw new Exception('E-mail non reconnu.');
    }
  }

  /**
   * Verifications of email to reset a password
   * 
   * @param string $login email
   * @return object User user who correspond to the email
   * @access public
   */
  public function verifMail(string $login): User
  {
    require_once 'User.php';

    $stmt = $this->conn->prepare('SELECT * FROM utilisateurs WHERE login_u= :email');
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $stmt->bindValue(':email', $login);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($user) > 0) {
      $newUser = new User($user[0]['id_u'], $user[0]['prenom_u'], $user[0]['nom_u'], $user[0]['role_u'], $user[0]['login_u'], $user[0]['mdp_u']);
      return ($newUser);
    } else {
      throw new Exception('E-mail non reconnu.');
    }
  }

  /**
   * Function to change password. Necessary to check to id and the pasdswords correspondence.
   * 
   * @param string $id_u user'id
   * @param string $password1 first attachment
   * @param string $password2 second attachment
   * @access public
   */
  public function changemdp(string $id_u, string $password1, string $password2)
  {
    if ($password1 === $password2) {
      $password = password_hash($password1, PASSWORD_DEFAULT);
      $result = $this->conn->query("SELECT COUNT(*) as verif FROM utilisateurs WHERE id_u= '$id_u'")->fetch(PDO::FETCH_ASSOC);
      if ($result['verif'] > 0) {
        $stmt = $this->conn->prepare('UPDATE utilisateurs SET mdp_u = :mdp WHERE id_u= :id');
        $stmt->bindValue(':id', $id_u);
        $stmt->bindValue(':mdp', $password);
        $stmt->execute();
      } else {
        throw new Exception('Reinitialisation impossible.');
      }
    } else {
      throw new Exception('Mots de passe incohérents.');
    }
  }
}
