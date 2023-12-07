<?php

class UserManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }


  /*
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

          header("Location:index.php?page=administr&&user_id=$id_u");
        } else {
          throw new Exception('Identifiants invalides');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  */

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


  public function affichageInfos(): array
  {

    require_once 'User.php';
    try {
      $user = $this->pdo->query('SELECT * FROM utilisateurs');
      $user->setFetchMode(PDO::FETCH_CLASS, 'User');
      if($personne  = $user->fetchAll(PDO :: FETCH_ASSOC)){
        foreach ($personne as $value){
          $personneAAfficher = new User ($value['id_u'], $value['prenom_u'], $value['nom_u'], $value['role_u'], $value['login_u'], $value['mdp_u']);
          $personneTab[]=$personneAAfficher;
        }
        return($personneTab);
      } else {
        throw new Exception('Affichage impossible');
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function newUser($uuid, $prenom, $nom, $role, $login, $mdp)
  {
    require_once 'User.php';
    try {

      $insert = $this->pdo->prepare("INSERT INTO utilisateurs (id_u, prenom_u, nom_u, role_u, login_u, mdp_u) VALUES (?,?,?,?,?,?)");
      $insert->execute([$uuid, $prenom, $nom, $role, $login, $mdp]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  public function suppUser($id)
  {
    require_once 'User.php';
    try {
      $supp = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id_u=?");
      $supp->execute([$id]);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}
