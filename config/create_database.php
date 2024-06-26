<?php
include_once '../config/Database.php';
require '../config/functions.php';

/* EN : Database and tables creation and add data
FR : Creation de la base de donnée, creation des tables et ajouts de données
*/

try {
  $db = new Database();
  $pdo = $db->createDatabase();

  if ($pdo->exec('DROP DATABASE IF EXISTS garageParrot') !== false) {
    if ($pdo->exec('CREATE DATABASE garageParrot') !== false) {
      $newpdo = $db->getConnection();

      $uti = 'CREATE TABLE utilisateurs (
   id_u UUID NOT NULL,
   prenom_u VARCHAR(30) NOT NULL,
   nom_u VARCHAR(30) NOT NULL,
   role_u CHAR (3) NOT NULL,
   login_u VARCHAR(150) NOT NULL,
   mdp_u VARCHAR(100) NOT NULL
)';

      $lbl = 'CREATE TABLE lbl (
  id_lbl INT PRIMARY KEY AUTO_INCREMENT,
  code_lbl CHAR(3) NOT NULL,
  lbl VARCHAR(100) NOT NULL
)';

      $heures = 'CREATE TABLE heures (
  id_h INT PRIMARY KEY AUTO_INCREMENT,
  jour CHAR(3) NOT NULL,
  hr_debut CHAR(5) NOT NULL,
  hr_fin CHAR(5) NOT NULL,
  id_u VARCHAR(150) NOT NULL,
  FOREIGN KEY (id_u) REFERENCES utilisateurs (id_u)
)';

      $avis = 'CREATE TABLE avis (
  id_a INT PRIMARY KEY AUTO_INCREMENT,
  titre_a VARCHAR(100) NOT NULL,
  commentaire_a VARCHAR(250) NOT NULL,
  dt_a TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  visiteur_nom VARCHAR(30) NOT NULL,
  visiteur_prenom VARCHAR(30) NOT NULL,
  note_a INT(1) NOT NULL,
  id_u VARCHAR(150) NOT NULL,
  statut VARCHAR(15) NOT NULL,
  FOREIGN KEY (id_u) REFERENCES utilisateurs (id_u)
)';

      $prestations = 'CREATE TABLE prestations (
  id_p INT PRIMARY KEY AUTO_INCREMENT,
  nom_p VARCHAR(30) NOT NULL,
  petite_description_p VARCHAR(100) NOT NULL,
  large_description_p VARCHAR(500),
  id_u VARCHAR(150) NOT NULL,
  FOREIGN KEY (id_u) REFERENCES utilisateurs (id_u)
)';

      $voitures = 'CREATE TABLE voitures (
  id_v INT PRIMARY KEY AUTO_INCREMENT,
  titre_v VARCHAR(100) NOT NULL,
  petite_description_v VARCHAR(500) NOT NULL,
  large_description_v VARCHAR(1000),
  marque VARCHAR(30) NOT NULL,
  modele VARCHAR(50) NOT NULL,
  prix FLOAT NOT NULL,
  img VARCHAR(100) DEFAULT "public/assets/img/gvplogo.JPG",
  annee CHAR(4) NOT NULL,
  kilometre INT(10) NOT NULL,
  id_u VARCHAR(150) NOT NULL,
  statut VARCHAR(30) NOT NULL,
  FOREIGN KEY (id_u) REFERENCES utilisateurs (id_u)
)';

      $infos_voitures = 'CREATE TABLE infos_voiture (
  id_i INT NOT NULL,
  type VARCHAR(30),
  carburant VARCHAR(30),
  couleur VARCHAR(30),
  nb_portes INT(1),
  nb_places INT(2),
  puissance_fiscale CHAR(1),
  CONSTRAINT FK_infosV FOREIGN KEY (id_i)
    REFERENCES voitures (id_v) ON DELETE SET NULL
)';

      $evenements = 'CREATE TABLE evenements (
  id_e INT PRIMARY KEY AUTO_INCREMENT,
  id_u VARCHAR(150),
  ip VARCHAR(150) NOT NULL,
  info_e VARCHAR(150) NOT NULL,
  dt_e TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_u) REFERENCES utilisateurs (id_u))';

      $table = array($uti, $lbl, $heures, $avis, $prestations, $voitures, $infos_voitures, $evenements);

      foreach ($table as $tabl) {
        if ($newpdo->exec($tabl) !== false) {
          echo "$tabl : Installation réussis !<br>";
        } else {
          echo 'Erreur installation !<br>';
        }
      }
      //If all ok -> Add data
      require 'insert_data.php';
    } else {
      echo 'Impossible de créer la base<br>';
    }
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}

