<?php

class Avis
{

  private int $id_a;
  private string $titre_a;
  private string $commentaire_a;
  private string $dt_a;
  private string $visiteur_nom;
  private string $visiteur_prenom;
  private int $note_a;
  private string $statut;

  public function getId(): int
  {
    return $this->id_a;
  }

  public function getTitre(): string
  {
    return $this->titre_a;
  }

  public function getCommentaire(): string
  {
    return $this->commentaire_a;
  }

  public function getDate(): string
  {
    return $this->dt_a;
  }

  public function getInfosVisiteur(): string
  {
    return $this->visiteur_prenom . " " . $this->visiteur_nom;
  }

  public function getNote(): string
  {
    return $this->note_a;
  }

  public function getSatut(): string
  {
    return $this->statut;
  }
}
