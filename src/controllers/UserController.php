<?php

/**
 * Controller for user and admin identification
 *
 * @author Morgane G.
 */

class UserController
{

  private $db;

  /**
   * Constructor
   *
   */
  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  /**
   * Display the user/admin list in adlin space
   *
   */
  public function affichageListUser()
  {
    $user = new UserManager($this->db);
    $user = $user->affichageInfos();
    $j = 1;
    foreach ($user as $row) {
      $infos = $row->getInfos();
      $role = $row->getRole();
      $mail = $row->getMail();
      include 'src/views/administration/usersListAdmin.php';
      $j++;
    }
  }

  /**
   * Function to add a "User" or an "Admin" in admin space
   *
   * @param array $donnees
   */
  public function ajouterUser(array $donnees)
  {
    $newuser = $donnees;
    $connection = new UserManager($this->db);
    $user = $connection->newUser($newuser);
  }
}
