<?php

try {
  require 'db.php';

  $mdp = password_hash('Jaimelesvoitures', PASSWORD_DEFAULT);

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
        VALUES (UUID(), 'Vincent', 'Parrot', 'ADM', 'v.parrot@example.com','$mdp')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('LUN', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('MAR', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('MER', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('JEU', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('VEN', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('SAM', '08:00', '18:00')") &&
    $pdo->exec("INSERT INTO heures (jour, hr_debut, hr_fin) VALUES ('DIM', 'Ferme', 'Ferme')") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a) 
    VALUES ('Super', 'Très bon garage. Acceuil chaleureux. Réparations rapide.', 'Parker', 'Peter', 5)") &&
    $pdo->exec("INSERT INTO avis (titre_a, commentaire_a, visiteur_nom, visiteur_prenom, note_a) 
        VALUES ('Très bien.', 'Réparations rapides.', 'Jane', 'Marie', 5)") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Entretien', 'Preservez la fiabilité et la durabilité de votre voiture', 'Nos services d*entretien méticuleux garantissent non seulement des performances optimales mais aussi une tranquillité d*esprit, en préservant la fiabilité et la durabilité de votre voiture.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Réparation', 'Des solutions personnalisées pour redonner vie à votre véhicule', 'Des solutions personnalisées pour redonner vie à votre véhicule. Nos mécaniciens experts diagnostiquent et réparent avec précision, assurant une conduite sûre et fiable, réduisant les tracas pour vous remettre rapidement sur la route.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Révision', 'Pour circuler en sécurité.', 'Le rendez-vous indispensable pour votre tranquillité. Nos services de révision approfondie assurent une attention méticuleuse à chaque détail de votre véhicule, garantissant non seulement des performances optimales, mais également une fiabilité sans compromis pour votre sécurité et votre confort sur la route.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Vidange', 'Pronlongez la durée de vie de votre véhicule et optimisez ses performances', 'Une cure de jeunesse pour votre moteur. Nos services de vidange réguliers préservent la vitalité de votre véhicule, prolongeant sa durée de vie et optimisant ses performances, le tout pour votre confort et votre tranquillité d*esprit.')") &&
    $pdo->exec("INSERT INTO prestations (nom_p, petite_description_p, large_description_p) 
        VALUES ('Vente de véhicules', 'Trouvez le compagnon de route idéal.', 'Trouvez le compagnon de route idéal. Notre sélection minutieuse de véhicules répond à vos besoins spécifiques, avec des options fiables et adaptées, soutenues par des conseils experts pour votre satisfaction totale.')") &&
    $pdo->exec("INSERT INTO voitures(titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)
      VALUES(
        'KIA Picanto 2022',
        'KIA',
        'Picanto 1.0 essence 66 chevaux ISG BVM5',
        'Découvrez la Kia Picanto, une voiture compacte qui incarne l*alliance parfaite entre style, agilité et efficacité. Avec son design moderne et dynamique, la Picanto se distingue sur la route, tandis que son intérieur intelligent offre confort et praticité.',
        'Découvrez l*excellence automobile avec notre Kia Picanto exceptionnelle ! Dotée d*un moteur essence économique, cette voiture compacte offre une conduite réactive et une consommation de carburant remarquable. Son design moderne, son intérieur spacieux, et ses fonctionnalités avancées telles que la connectivité smartphone et les systèmes de sécurité innovants en font le choix idéal pour les déplacements urbains. Cette Kia Picanto, avec seulement 13 000 kilomètres au compteur, est en excellent état, prête à vous offrir des années de conduite fiable et confortable. Contactez-nous pour un essai routier et découvrez par vous-même la perfection de la Kia Picanto !',
        11400,
        'kia-picanto.jpg',
        2022,
        13000,
        'Dispo');") &&
    $pdo->exec("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
    VALUES ( 1,'Manuelle','Jaune',5,'Essence',5,4);") &&
    $pdo->exec("INSERT INTO voitures(titre_v,marque,modele,petite_description_v,large_description_v,prix,img,annee,kilometre,statut)
            VALUES(
              'RENAUD Clio V',
              'RENAUD',
              'Clio 1.5 DCI 115 BUSINESS',
              'La Clio V allie style élégant et performances, offrant une conduite urbaine agile et une connectivité avancée, faisant d*elle un choix idéal pour ceux recherchant une conduite plaisante et moderne.',
              'La Renault Clio V incarne l*essence même de l*innovation automobile. Son design épuré et dynamique attire l*œil, mais c*est sous le capot et à l*intérieur que cette voiture compacte révèle tout son potentiel. Dotée d*une gamme de moteurs écoénergétiques et performants, elle offre une conduite réactive et économique. Son habitacle raffiné et ergonomique est un véritable cocon technologique, avec des fonctionnalités avancées telles que l*écran tactile intuitif, les systèmes de sécurité active et passive de pointe, ainsi qu*une connectivité de pointe pour rester toujours connecté. La Clio V est une fusion parfaite entre style, confort et innovation, redéfinissant ainsi les normes de la conduite urbaine moderne.',
               14890,
               'renaud-clio.jpg',
               2020,
               67845,
               'Dispo');") &&
    $pdo->exec("INSERT INTO infos_voiture(id_i, type, couleur, nb_portes, carburant, nb_places, puissance_fiscale) 
    VALUES (2,'Manuelle','Noire',5,'Diesel',5,5);")
    !== false
  ) {
    echo "Ajout réussis";
  } else {
    echo "Erreur ajout";
  }
} catch (PDOException $exception) {
  die($exception->getMessage());
}
