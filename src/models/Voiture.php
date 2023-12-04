<?php

class Voiture
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

  public function __construct ($id_v, $titre_v, $petite_description_v, $large_description_v, $marque, $modele, $prix, $img, $annee, $kilometre, $statut){
    $this->id_v = $id_v;
    $this->titre_v = $titre_v;
    $this->petite_description_v = $petite_description_v;
    $this->large_description_v = $large_description_v;
    $this->marque = $marque;
    $this->modele = $modele;
    $this->prix = $prix;
    $this->img = $img;
    $this->annee = $annee;
    $this->kilometre = $kilometre;
    $this->statut = $statut;

  }


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

  
}
