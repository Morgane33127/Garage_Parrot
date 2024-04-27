<?php

/**
 * Hour Class
 * 
 * To construct hours, get and set informations
 */

class Heure
{

  private int $id_h;
  private string $jour;
  private string $hr_debut;
  private string $hr_fin;
  private string $lbl;
  private string $id_u;

  public function __construct($id_h, $jour, $hr_debut, $hr_fin, $lbl, $id_u)
  {
    $this->id_h = $id_h;
    $this->jour = $jour;
    $this->hr_debut = $hr_debut;
    $this->hr_fin = $hr_fin;
    $this->lbl = $lbl;
    $this->id_u = $id_u;
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

  public function getUserId(): string
  {
  return $this->id_u;
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

  public function setHeureLbl($lbl)
  {
    $this->lbl = $lbl;
  }

  public function setUserId($id_u)
  {
    $this->id_u = $id_u;
  }
}
