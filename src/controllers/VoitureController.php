<?php

class VoitureController
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function affichageCard()
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoitures(2);
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = 'public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      include 'src/views/voitureCard.php'; // Afficher la vue voiture
    }
  }

    public function affichageAll()
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voitures = $voiture->affichageVoituresAll();
    foreach ($voitures as $row) {
      $id = $row->getId();
      $titre = $row->getTitre();
      $description = $row->getPetiteDescription();
      $img = 'public/assets/img/' . $row->getImage();
      $prix = number_format($row->getPrix(), 0, ',', ' ');
      include 'src/views/administration/voitureCardAdmin.php'; // Afficher la vue voiture
    }
  }

  public function voitureInfos($id)
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
      include 'src/views/voitureInfos.php'; // Afficher la vue voitureInfos
    
  }

  public function voitureInfosAdmin($id)
  {

    // Obtenir les détails de les prestations
    $voiture = new VoitureManager($this->db);
    $voiture = $voiture->affichageInfos($id);
      include 'src/views/administration/voitureInfosAdmin.php'; // Afficher la vue voitureInfos
    
  }

  public function filtrerPrice($prix)
  {
        $page=1;
        $voiture = new VoitureManager($this->db);
        $voitures = $voiture->affichageVoituresPrix($prix, $page);
        $response = '';
        if(count($voitures) != 0){
        foreach ($voitures as $row) {
          $id = $row->getId();
          $titre = $row->getTitre();
          $description = $row->getPetiteDescription();
          $img = 'public/assets/img/' . $row->getImage();
          $prix = number_format($row->getPrix(), 0, ',', ' ');
          $response .= "<div class=\"voiture-card\">
          <div>
            <h5>$titre</h5>
            <p>$description</p>
            <button class=\"button\">
              <p class=\"titre\">$prix €</p>
            </button>
            <a href=\"index.php?page=vinfo&id=$id\" class=\"link\">En savoir plus >></a>
          </div>
          <div>
            <img src=\"$img\" alt=\"Logo Garge V. Parrot\" style=\"height:150px;\">
          </div>
        </div>";
    }  } else {
      $response = "Aucun résultat.";
    }
    return $response;
  }

  public function filtrerKm($km)
  {
        $page=1;
        $voiture = new VoitureManager($this->db);
        $voitures = $voiture->affichageVoituresKm($km, $page);
        $response = '';
        if(count($voitures) != 0){
        foreach ($voitures as $row) {
          $id = $row->getId();
          $titre = $row->getTitre();
          $description = $row->getPetiteDescription();
          $img = 'public/assets/img/' . $row->getImage();
          $prix = number_format($row->getPrix(), 0, ',', ' ');
          $response .= "<div class=\"voiture-card\">
          <div>
            <h5>$titre</h5>
            <p>$description</p>
            <button class=\"button\">
              <p class=\"titre\">$prix €</p>
            </button>
            <a href=\"index.php?page=vinfo&id=$id\" class=\"link\">En savoir plus >></a>
          </div>
          <div>
            <img src=\"$img\" alt=\"Logo Garge V. Parrot\" style=\"height:150px;\">
          </div>
        </div>";
    }} else {
      $response = "Aucun résultat.";
    }
    return $response;
  }

  public function filtrerDate($date)
  {
        $page=1;
        $voiture = new VoitureManager($this->db);
        $voitures = $voiture->affichageVoituresAnnee($date, $page);
        $response = '';
        if(count($voitures) != 0){
        foreach ($voitures as $row) {
          $id = $row->getId();
          $titre = $row->getTitre();
          $description = $row->getPetiteDescription();
          $img = 'public/assets/img/' . $row->getImage();
          $prix = number_format($row->getPrix(), 0, ',', ' ');
          $response .= "<div class=\"voiture-card\">
          <div>
            <h5>$titre</h5>
            <p>$description</p>
            <button class=\"button\">
              <p class=\"titre\">$prix €</p>
            </button>
            <a href=\"index.php?page=vinfo&id=$id\" class=\"link\">En savoir plus >></a>
          </div>
          <div>
            <img src=\"$img\" alt=\"Logo Garge V. Parrot\" style=\"height:150px;\">
          </div>
        </div>";
    }} else {
      $response = "Aucun résultat.";
    }
    return $response;
  }

  public function ajouterVoiture($donnees)
  {
    $newVoiture = $donnees;
    $connection = new VoitureManager($this->db);
    $voiture = $connection->newVoiture($newVoiture);
  }

}
