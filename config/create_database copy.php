<?php
try {
  $pdo = new PDO('mysql:host=localhost', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($pdo->exec('DROP DATABASE IF EXISTS garageParrot') !== false) {
    if ($pdo->exec('CREATE DATABASE garageParrot') !== false) {
      $garageParrot = new PDO('mysql:dbname=garageParrot;host=localhost', 'root', '');

      if ($garageParrot->exec('CREATE TABLE utilisateurs (
   id_u UUID NOT NULL,
   prenom_u VARCHAR(30) NOT NULL,
   nom_u VARCHAR(30) NOT NULL,
   role_u CHAR (3) NOT NULL,
   login_u VARCHAR(150) NOT NULL,
   mdp_u VARCHAR(100) NOT NULL
)') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Utilisateurs<br>';
      }

      if ($garageParrot->exec('CREATE TABLE lbl (
                id_lbl INT PRIMARY KEY AUTO_INCREMENT,
                code_lbl CHAR(3) NOT NULL,
                lbl VARCHAR(100) NOT NULL
             )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Lbl<br>';
      }

      if ($garageParrot->exec('CREATE TABLE heures (
                            id_h INT PRIMARY KEY AUTO_INCREMENT,
                            jour CHAR(3) NOT NULL,
                            hr_debut CHAR(5) NOT NULL,
                            hr_fin CHAR(5) NOT NULL
                         )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Heures<br>';
      }

      if ($garageParrot->exec('CREATE TABLE avis (
                                        id_a INT PRIMARY KEY AUTO_INCREMENT,
                                        titre_a VARCHAR(100) NOT NULL,
                                        commentaire_a VARCHAR(250) NOT NULL,
                                        dt_a TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                        visiteur_nom VARCHAR(30) NOT NULL,
                                        visiteur_prenom VARCHAR(30) NOT NULL,
                                        note_a INT(1) NOT NULL
                                     )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Avis<br>';
      }

      if ($garageParrot->exec('CREATE TABLE prestations (
                                                    id_p INT PRIMARY KEY AUTO_INCREMENT,
                                                    nom_p VARCHAR(30) NOT NULL,
                                                    petite_description_p VARCHAR(100) NOT NULL,
                                                    large_description_p VARCHAR(500)
                                                 )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Prestations<br>';
      }

      if ($garageParrot->exec('CREATE TABLE voitures (
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
                                                                statut VARCHAR(30) NOT NULL
                                                             )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Voitures<br>';
      }

      if ($garageParrot->exec('CREATE TABLE infos_voiture (
                id_i INT NOT NULL,
                type VARCHAR(30),
                carburant VARCHAR(30),
                couleur VARCHAR(30),
                nb_portes INT(1),
                nb_places INT(2),
                puissance_fiscale CHAR(1),
                conso INT(3),
                FOREIGN KEY (id_i) REFERENCES voitures (id_v)
             )') !== false) {
        echo 'Installation terminée !';
      } else {
        echo 'Impossible de créer la table Infos_voiture<br>';
      }
    } else {
      echo 'Impossible de créer la base<br>';
    }
  }
} catch (PDOException $exception) {
  die($exception->getMessage());
}
