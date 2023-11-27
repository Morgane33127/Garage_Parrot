<?php

class Car
{

  private int $id_v;
  private string $titre_v;
  private string $petite_description_v;
  private string $large_description_v;
  private string $marque;
  private string $modele;
  private float $prix;
  private string $img;
  private string $annee;
  private int $kilometre;
  private string $statut;
  private string $type;
  private string $carburant;
  private string $couleur;
  private int $nb_portes;
  private int $nb_places;
  private int $puissance_fiscale;

  public function getId(): int
  {
    return $this->id_v;
  }

  public function getTitre(): string
  {
    return $this->titre_v;
  }

  public function getPetiteDescription(): string
  {
    $this->petite_description_v = str_replace("*", "'", $this->petite_description_v);
    return $this->petite_description_v;
  }

  public function getLargeDescription(): string
  {
    $this->large_description_v = str_replace("*", "'", $this->large_description_v);
    return $this->large_description_v;
  }

  public function getMarque(): string
  {
    return $this->marque;
  }

  public function getModele(): string
  {
    return $this->modele;
  }

  public function getPrix(): string
  {
    return $this->prix;
  }

  public function getImage(): string
  {
    return $this->img;
  }

  public function getAnnee(): string
  {
    return $this->annee;
  }

  public function getKilometre(): string
  {
    return $this->kilometre;
  }
  public function getStatut(): string
  {
    return $this->statut;
  }

  public function getType(): string
  {
    return $this->type;
  }

  public function getCarburant(): string
  {
    return $this->carburant;
  }

  public function getCouleur(): string
  {
    return $this->couleur;
  }

  public function getNbPortes(): int
  {
    return $this->nb_portes;
  }

  public function getNbPlaces(): int
  {
    return $this->nb_places;
  }

  public function getPuissance(): int
  {
    return $this->puissance_fiscale;
  }
}
