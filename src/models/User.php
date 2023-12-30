<?php

/**
 * User Class
 * 
 * To construct users and get informations
 */

class User
{

  private string $id_u;
  private string $nom_u;
  private string $prenom_u;
  private string $role_u;
  private string $login_u;
  private string $mdp_u;


  public function __construct($id_u, $nom_u, $prenom_u, $role_u, $login_u, $mdp_u)
  {
    $this->id_u = $id_u;
    $this->nom_u = $nom_u;
    $this->prenom_u = $prenom_u;
    $this->role_u = $role_u;
    $this->login_u = $login_u;
    $this->mdp_u = $mdp_u;
  }

  public function getPassword(): string
  {
    return $this->mdp_u;
  }

  public function getMail(): string
  {
    return $this->login_u;
  }

  public function getInfos(): string
  {
    return $this->prenom_u . " " . $this->nom_u;
  }

  public function getId(): string
  {
    return $this->id_u;
  }
  public function getRole(): string
  {
    return $this->role_u;
  }
  public function getPrenom(): string
  {
    return $this->prenom_u;
  }
  public function getNom(): string
  {
    return $this->nom_u;
  }
}
