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
        $user = $stmt->fetch();
        $id_u = $user->getId();
        if (!empty($user) && password_verify($mdp, $user->getPassword()) == true) {
          $event = $this->conn->prepare('INSERT INTO evenements (id_u, info_e) VALUES (:id_u, :info_e)');
          $event->bindValue(':id_u', $user->getId());
          $event->bindValue('info_e', 'Nouvelle connexion');
          $event->execute();
          return ($user);
        } else {
          throw new Exception('Identifiants invalides');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
