<?php

/**
 * Notice Class
 * 
 * To construct notices and get informations
 */

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

  public function __construct($id_a, $titre_a, $commentaire_a, $visiteur_nom, $visiteur_prenom, $note_a, $statut, $dt_a)
  {
    $this->id_a = $id_a;
    $this->titre_a = $titre_a;
    $this->commentaire_a = $commentaire_a;
    $this->visiteur_nom = $visiteur_nom;
    $this->visiteur_prenom = $visiteur_prenom;
    $this->note_a = $note_a;
    $this->statut = $statut;
    $this->dt_a = $dt_a;
  }

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

  public function getVisiteurNom(): string
  {
    return $this->visiteur_nom;
  }

  public function getVisiteurPrenom(): string
  {
    return $this->visiteur_prenom;
  }

  public function getNote(): int
  {
    return $this->note_a;
  }

  public function getStatut(): string
  {
    return $this->statut;
  }
}
