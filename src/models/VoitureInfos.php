<?php

class VoitureInfos extends Voiture
{
    private int $id_i;
    private string $type;
    private string $carburant;
    private string $couleur;
    private int $nb_portes;
    private int $nb_places;
    private int $puissance_fiscale;

    public function __construct ($id_v, $titre_v, $petite_description_v, $large_description_v, $marque, $modele, $prix, $img, $annee, $kilometre, $statut, $id_i, $type, $carburant, $couleur, $nb_portes, $nb_places, $puissance_fiscale){
        parent::__construct($id_v, $titre_v, $petite_description_v, $large_description_v, $marque, $modele, $prix, $img, $annee, $kilometre, $statut);
        $this->id_i = $id_i;
        $this->type = $type;
        $this->carburant = $carburant;
        $this->couleur = $couleur;
        $this->nb_portes = $nb_portes;
        $this->nb_places = $nb_places;
        $this->puissance_fiscale = $puissance_fiscale;
      }

    public function getIdI(): int
    {
      return $this->id_i;
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