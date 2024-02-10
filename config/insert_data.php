<?php

include_once '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4()->toString();

try {
  $db = new Database();
  $pdo = $db->getConnection();

  $mdp = password_hash('Jaimelesvoituresdu31100', PASSWORD_DEFAULT);

  if (
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('ADM', 'ADMIN')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('USR', 'USER')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('LUN', 'Lundi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('MAR', 'Mardi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('MER', 'Mercredi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('JEU', 'Jeudi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('VEN', 'Vendredi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('SAM', 'Samedi')") &&
    $pdo->exec("INSERT INTO lbl (code_lbl, lbl) VALUES ('DIM', 'Dimanche')") &&

    $pdo->exec("INSERT INTO utilisateurs (id_u, prenom_u, nom_u, role_u, login_u, mdp_u) 
        VALUES ('$uuid', 'Vincent', 'Parrot', 'ADM', 'v.parrot@example.com','$mdp')") &&

    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('LUN', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('MAR', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('MER', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('JEU', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('VEN', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('SAM', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('DIM', 'Ferme', 'Ferme')") &&

    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut)
    VALUES ('Super', 'Très bon garage. Acceuil chaleureux. Réparations rapide.', 'Parker', 'Peter', 5, 'Valide')") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut)
        VALUES ('Très bien.', 'Réparations rapides.', 'Jane', 'Marie', 5, 'Valide')") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) 
            VALUES ('Top!', 'Très serviable ! Voiture rendue plus que dans les temps.', 'John', 'Martinez', 5, 'Valide')") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) 
            VALUES ('Première visite.', 'Rdv rapide, prix corrects et le patron connait son travail. J\'y retournerai.', 'Sandrine', 'Petit', 5, 'En attente')") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a, statut) 
                VALUES ('Super garage', 'Super garage, très pro, personnel et patron au top.', 'Florient', 'Derat', 5, 'En attente')") &&

    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Entretien', 'Preservez la performance et la sécurité de votre véhicule.', 'Nos services d\'entretien méticuleux garantissent non seulement des performances optimales mais aussi une tranquillité d\'esprit, pour prendre la route en toute sécurité.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Réparation', 'Redonner vie à votre véhicule.', 'Nos mécaniciens experts diagnostiquent et réparent avec précision vos problèmes mécaniques et de carrosserie, assurant une conduite sûre et fiable, pour vous remettre rapidement sur la route.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Révision', 'Pour circuler en sécurité.', 'Le rendez-vous indispensable! Afin d\'assurer votre sécurité sur la route, mais aussi de conserver des performances optimales, nous vérifions méticuleusement les dizaines de points de contrôle.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Vidange', 'Prolongez la durée de vie de votre véhicule et optimisez ses performances.', 'A réaliser tous les 10 000 à 15 000 km sur un moteur essence, et tous les 7000 à 10 000 km sur un moteur diesel.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Vente de véhicules', 'Trouvez le compagnon de route idéal.', 'Trouvez le compagnon de route idéal grâce à nos voitures disponibles à la vente et des conseils experts.')") &&

    $pdo->exec("INSERT INTO voitures(titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)
      VALUES(
        'KIA Picanto 2022',
        'KIA',
        'KIA Picanto 1.0 essence 66 chevaux ISG BVM5',
        'KIA Picanto 1.0 essence 66 chevaux ISG BVM5. 5 portes, 4CV, manuelle, essence.',
        'KIA Picanto 1.0 essence 66 chevaux ISG BVM5. 5 portes, 4CV, manuelle, essence, rétroviseurs et vitres électriques, tableau de bord, bluetooth, 
        climatisation, fermeture centralisée,  rétroviseurs dégivrants, ABS, phares antibrouillard, régulateur de vitesse.',
        11400,
        'kia-picanto.jpg',
        2022,
        13000,
        'Dispo')") &&
    $pdo->exec("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
    VALUES ( 1,'Manuelle','Jaune',5,'Essence',5,4);") &&
    $pdo->exec("INSERT INTO voitures(titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)
        VALUES(
          'Mini Hatch',
          'Mini',
          'Mini Hatch Cooper S 178 ch BVA7 Edition Camden',
          'Mini Hatch première main, edition Camden berline, rouge, 9 CV, 3 portes.',
          'Mini Hatch 3 Portes Cooper S 178 ch BVA7 Edition Camden berline, rouge, 9 cv, 3 portes, première mise en circulation le 24/08/2021, première main.',
          12303,
          'mini-hatch.jpg',
          2019,
          22600,
          'Dispo')") &&
    $pdo->exec("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
      VALUES ( 2,'Manuelle','Rouge',5,'Essence',5,9);") &&
    $pdo->exec("INSERT INTO voitures(titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)
            VALUES(
              'RENAUD Clio V',
              'RENAUD',
              'RENAUD Clio 1.5 DCI 115 BUSINESS',
              'RENAUD Clio 1.5 DCI 115 BUSINESS. 5 portes, 5CV, manuelle, diesel.',
              'RENAUD Clio 1.5 DCI 115 BUSINESS. 5 portes, 5CV, manuelle, diesel, 67 000km, 5 places, climatisation, ABS, ...',
               14890,
               'renaud-clio.jpg',
               2020,
               67845,
               'Dispo');") &&
    $pdo->exec("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
    VALUES (3,'Manuelle','Noire',5,'Diesel',5,5)")
    !== false
  ) {
    echo "Ajout réussis <br>";
  } else {
    echo "Données non ajoutées à la BDD <br>";
    error("Données non ajoutées à la BDD");
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}
