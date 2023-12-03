<?php

class Prestation
{

  private int $id_p;
  private string $nom_p;
  private string $petite_description_p;
  private string $large_description_p;

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
