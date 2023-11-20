<?php

class User
{

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
    return $this->nom_u . $this->prenom_u;
  }
}
