<?php

class UserController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichageListUser()
  {

    // Obtenir les détails de les prestations
    $user = new UserManager($this->db);
    $user = $user->affichageInfos();
    $j=1;
    foreach ($user as $row) {
      $infos = $row->getInfos();
      $role = $row->getRole();
      $mail = $row->getMail();
      include 'src/views/administration/usersListAdmin.php'; // Afficher la vue de connexion
      $j++;
    }
  }

  public function ajouterUser($donnees)
  {
    $newuser = $donnees;
    $connection = new UserManager($this->db);
    $user = $connection->newUser($newuser);
  }

}
