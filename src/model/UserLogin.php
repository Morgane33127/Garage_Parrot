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
        if (!empty($user) && password_verify($mdp, $user->getPassword()) == true) {
          echo "yes";
          header('Location:administr.php');
        } else {
          throw new Exception('Identifiants invalides');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
