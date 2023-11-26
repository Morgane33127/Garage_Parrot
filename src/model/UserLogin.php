<?php

class UserLogin
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  public function connect(string $mdp, string $login): User
  {

    require_once 'User.php';
    try {
      $mail = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE login_u= :email');
      $mail->setFetchMode(PDO::FETCH_CLASS, 'User');
      $mail->bindValue(':email', $login);
      if ($mail->execute()) {
        $user = $mail->fetch();
        $id_u = $user->getId();
        if (!empty($user) && password_verify($mdp, $user->getPassword()) == true) {
          $event = $this->pdo->prepare('INSERT INTO evenements (id_u, info_e) VALUES (:id_u, :info_e)');
          $event->bindValue(':id_u', $user->getId());
          $event->bindValue('info_e', 'Nouvelle connexion');
          $event->execute();

          header("Location:index.php?page=administr&&id=$id_u");
        } else {
          throw new Exception('Identifiants invalides');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function role(string $id): User
  {

    require_once 'User.php';
    try {
      $role = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE id_u= :id');
      $role->setFetchMode(PDO::FETCH_CLASS, 'User');
      $role->bindValue(':id', $id);
      if ($role->execute()) {
        $personne = $role->fetch();
        return $personne;
      } else {
        throw new Exception('Affichage impossible');
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
