<?php

class User
{

  private string $id_u;
  private string $nom_u;
  private string $prenom_u;
  private string $login_u;
  private string $mdp_u;

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
}
