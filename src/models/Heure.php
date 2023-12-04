<?php

class Heure
{

  private int $id_h;
  private string $jour;
  private string $hr_debut;
  private string $hr_fin;
  private string $lbl;

  public function __construct ($id_h, $jour, $hr_debut, $hr_fin, $lbl){
    $this->id_h = $id_h;
    $this->jour = $jour;
    $this->hr_debut = $hr_debut;
    $this->hr_fin = $hr_fin;
    $this->lbl = $lbl;
  }

  public function getInfoHeure(): array
  {
    $infosHeure = array($this->id_h, $this->jour, $this->hr_debut, $this->hr_fin);
    return $infosHeure;
  }

  public function getIdHeure(): int
  {
    return $this->id_h;
  }

  public function getJourHeure(): string
  {
    return $this->jour;
  }

  public function getHeureDebut(): string
  {
    return $this->hr_debut;
  }

  public function getHeureFin(): string
  {
    return $this->hr_fin;
  }

  public function getHeureLbl(): string
  {
    return $this->lbl;
  }


  public function setJourHeure($jour)
  {
    $this->jour = $jour;
  }

  public function setHeureDebut($hr_debut)
  {
    $this->hr_debut = $hr_debut;
  }

  public function setHeureFin($hr_fin)
  {
    $this->hr_fin = $hr_fin;
  }
}
