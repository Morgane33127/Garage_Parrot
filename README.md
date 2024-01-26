# Garage_Parrot
# Exercice STUDI ECF

Ce fichier README a été généré le [2023-12-03] par [Morgane G.].

Dernière mise-à-jour le : [2024-01-14].

# INFORMATIONS GENERALES

# Description

Le site du Garage V. Parrot est un projet réalisé dans le cadre du diplome de "Developpeur web et web mobile" dispensé par l'ecole en ligne STUDI.

# Pré-requis
-serveur Web local

# Execution en local
Les fichiers sont disponibles depuis le repertoire : https://github.com/Morgane33127/Garage_Parrot.git
Pour les récupérer :
1) git clone https://github.com/Morgane33127/Garage_Parrot.git
OU
2) Télécharger les fichiers depuis le repertoire et décompresser le dossier sur son serveur Web local (WAMP, XAMPP, ...).

# Démarrage
1) Ouvrir son localhost et accéder au dossier créé.
2) La page d'accueil doit s'afficher.
3) Si le serveur n'est pas configuré par défaut ("root", "") se rendre dans le fichier config/Database.php pour changer les informations de connexion : "host", "username" et "password". Sinon passer cette étape.
4) Ajouter à son URL : "config/create_database.php" pour générer la base de données.
Exemple : http://garageparrot/Garage_Parrot/config/create_database.php
Ou "garageparrot" est le nom du virtualhost et "Garage_Parrot" le nom du dossier décompressé.

L'installation est terminée !

# Administration du site
Par défaut Mr parrot est créé comme administrateur de l'application web.
Pour changer cela :
Se rendre dans le fichier config/insert_data.php et modifier les infos de la ligne 25.
OU
Se connecter avec les identifiants de Mr Parrot et creer un nouvel administrateur via le formulaire dédié.