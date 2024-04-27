<?php

/**
 * Service Class
 * 
 * To construct services and get informations
 */

class Prestation
{

  private int $id_p;
  private string $nom_p;
  private string $petite_description_p;
  private string $large_description_p;
  private string $id_u;
  public function __construct($id_p, $nom_p, $petite_description_p, $large_description_p, $id_u)
  {
    $this->id_p = $id_p;
    $this->nom_p = $nom_p;
    $this->petite_description_p = $petite_description_p;
    $this->large_description_p = $large_description_p;
    $this->id_u = $id_u;
  }

  public function getId(): int
  {
    return $this->id_p;
  }

  public function getNom(): string
  {
    return $this->nom_p;
  }

  public function getPetiteDescription(): string
  {
    return $this->petite_description_p;
  }

  public function getLargeDescription(): string
  {
    return $this->large_description_p;
  }

  public function getUserId(): string
  {
    return $this->id_u;
  }

  public function setId($id_p)
  {
    $this->id_p = $id_p;
  }

  public function setNom($nom_p)
  {
    $this->nom_p = $nom_p;
  }

  public function setPetiteDescription($petite_description_p)
  {
    $this->petite_description_p = $petite_description_p;
  }

  public function setLargeDescription($large_description_p)
  {
    $this->large_description_p = $large_description_p;
  }
  public function setUserId($id_u)
  {
    $this->id_u = $id_u;
  }
}
