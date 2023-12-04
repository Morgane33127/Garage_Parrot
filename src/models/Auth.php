<?php
class Auth
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function login(string $mdp, string $login): User
  {
    require_once 'User.php';
    try {
      $stmt = $this->conn->prepare('SELECT * FROM utilisateurs WHERE login_u= :email');
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
      $stmt->bindValue(':email', $login);

      if ($stmt->execute()) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $newUser = new User ($user[0]['id_u'], $user[0]['prenom_u'], $user[0]['nom_u'], $user[0]['role_u'], $user[0]['login_u'], $user[0]['mdp_u']);
        $id_u = $newUser->getId();
        if (!empty($newUser) && password_verify($mdp, $newUser->getPassword()) == true) {
          $event = $this->conn->prepare('INSERT INTO evenements (id_u, info_e) VALUES (:id_u, :info_e)');
          $event->bindValue(':id_u', $id_u);
          $event->bindValue('info_e', 'Nouvelle connexion');
          $event->execute();
          return ($newUser);
        } else {
          throw new Exception('Identifiants invalides');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
