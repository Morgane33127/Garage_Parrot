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

  public function __construct($id_p, $nom_p, $petite_description_p, $large_description_p)
  {
    $this->id_p = $id_p;
    $this->nom_p = $nom_p;
    $this->petite_description_p = $petite_description_p;
    $this->large_description_p = $large_description_p;
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
}
