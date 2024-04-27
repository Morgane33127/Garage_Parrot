<?php

/**
 * Car Class
 * 
 * To construct cars and get informations
 */

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
  private string $id_u;
  private string $statut;

  public function __construct($id_v, $titre_v, $petite_description_v, $large_description_v, $marque, $modele, $prix, $img, $annee, $kilometre, $id_u, $statut)
  {
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
    $this->id_u = $id_u;
    $this->statut = $statut;
  }


  public function getId(): int
  {
    return $this->id_v;
  }

  public function getUserId(): string
  {
    return $this->id_u;
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
  public function setId($id_v)
  {
    $this->id_v = $id_v;
  }

  public function setUserId($id_u)
  {
    $this->id_u = $id_u;
  }

  public function setTitre($titre_v)
  {
    $this->titre_v = $titre_v;
  }

  public function setPetiteDescription($petite_description_v)
  {
    $this->petite_description_v = $petite_description_v;
  }

  public function setLargeDescription($large_description_v)
  {
    $this->large_description_v = $large_description_v;
  }

  public function setMarque($marque)
  {
    $this->marque = $marque;
  }

  public function setModele($modele)
  {
    $this->modele = $modele;
  }

  public function setPrix($prix)
  {
    $this->prix = $prix;
  }

  public function setImg($img)
  {
    $this->img = $img;
  }

  public function setAnnee($annee)
  {
    $this->annee = $annee;
  }

  public function setKilometre($kilometre)
  {
    $this->kilometre = $kilometre;
  }

  public function setStatut($statut)
  {
    $this->statut = $statut;
  }
}
