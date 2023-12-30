<?php
/* EN : This page allows you to manage visitor requests and “admin” side functionalities.
FR : Cette page permet de gérer les demandes des visiteurs et les fonctionnalitées du coté "admin".
*/

include_once 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

include_once './config/functions.php';
include_once './config/Database.php';
include_once 'config/autoload.php';

$pdo = new Database();
$pdo = $pdo->getConnection();


//Contact request
if (isset($_POST['contact'])) {

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['email'];
  $message = $_POST['message'];
  $tel = $_POST['tel'];
  $donnees = array($nom, $prenom, $message, $tel);

  verifMail($mail);

  foreach ($donnees as $donnee) {
    verifData($donnee);
  }

  sendMail($mail, 'Contact', $message);
  sessionAlert('success', 'Votre message a été envoyé avec succès.');
  header("Location: index.php?page=contact");
}

//Contact request for vehicle
if (isset($_POST['contact_voiture']) && !empty($_POST['v_id'])) {

  $id_v = $_POST['v_id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['email'];
  $message = $_POST['message'];
  $tel = $_POST['tel'];
  $donnees = array($nom, $prenom, $message, $tel);

  verifMail($mail);

  foreach ($donnees as $donnee) {
    verifData($donnee);
  }

  sendMail($mail, $id_v, $message);
  sessionAlert('success', 'Votre message a été envoyé avec succès.');
  header("Location: index.php?page=vehicules");
}

//Add a review
if (isset($_POST['ajouteravis'])) {

  $nom_a = $_POST['nom'];
  $prenom_a = $_POST['prenom'];
  $commentaire_a = $_POST['message'];
  $note = $_POST['note'];
  $titre_a = $_POST['titre'];

  $donnees = array(0 => $titre_a, 1 => $commentaire_a, 2 => $nom_a, 3 => $prenom_a, 4 => $note);
  $connection = new AvisController();
  $avis = $connection->ajouterAvis($donnees);
  sessionAlert('success', 'Avis envoyé pour vérification!');
  header('Location: index.php?page=avis&div=avis');
}

//Admin space
//Disconnect
if (isset($_POST['disconnect'])) {
  session_unset();
  header("Location: index.php?page=login");
}

//Add a user
if (isset($_POST['ajouterUser'])) {
  $uuid = Uuid::uuid4()->toString();
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $role = $_POST['role'];
  $login = $_POST['email'];
  $mdp = $_POST['mdp'];
  $mdp = password_hash($mdp, PASSWORD_BCRYPT);

  $donnees = array(0 => $uuid, 1 => $prenom, 2 => $nom, 3 => $role, 4 => $login, 5 => $mdp);
  $connection = new UserController();
  $user = $connection->ajouterUser($donnees);
  sessionAlert('success', 'Utilisateur ajouté avec succès!');
  header('Location: index.php?page=administr');
}

//Add a car
if (isset($_POST['ajouterVoiture'])) {

  if (!empty($_FILES['img']['name'])) {
    uploadFile('img');
    $img = $_FILES['img']['name'];
    if (file_exists("../public/assets/img/$img" === true)) {
      $img = $_FILES['img']['name'];
    }
  } else {
    $img = 'gvplogo.svg';
  }
  $titre_v = $_POST['titre_v'];
  $petite_description_v = $_POST['petite_description'];
  $large_description_v = $_POST['large_description'];
  $marque = $_POST['marque_v'];
  $modele = $_POST['modele_v'];
  $prix = $_POST['prix_v'];
  $annee = $_POST['annee_v'];
  $kilometre = $_POST['km_v'];
  $statut = 'Dispo';
  $type = $_POST['type_v'];
  $carburant = $_POST['carburant'];
  $couleur = $_POST['couleur_v'];
  $nb_portes = $_POST['nb_portes'];
  $nb_places = $_POST['nb_places'];
  $puissance_fiscale = $_POST['cv'];

  $donnees = array(
    0 => $titre_v, 1 => $petite_description_v, 2 => $large_description_v, 3 => $marque, 4 => $modele, 5 => $prix, 6 => $img, 7 => $annee,
    8 => $kilometre, 9 => $statut, 10 => $type, 11 => $carburant, 12 => $couleur, 13 => $nb_portes, 14 => $nb_places, 15 => $puissance_fiscale
  );
  $connection = new VoitureController();
  $voiture = $connection->ajouterVoiture($donnees);
  sessionAlert('success', 'Voiture ajoutée avec succès!');
  header('Location: index.php?page=administr');
}

//Update a car
if (isset($_POST['modifier_une_voiture'])) {
  if (!empty($_FILES['img']['name'])) {
    uploadFile('img');
    $img = $_FILES['img']['name'];
    if (file_exists("../public/assets/img/$img" === true)) {
      $img = $_FILES['img']['name'];
    }
  } else {
    $img = $_POST['img_v'];
  }
  $id_v = $_POST['id_v'];
  $titre_v = $_POST['titre_v'];
  $petite_description_v = $_POST['petite_description_v'];
  $large_description_v = $_POST['large_description_v'];
  $marque = $_POST['marque_v'];
  $modele = $_POST['modele_v'];
  $prix = $_POST['prix_v'];
  $annee = $_POST['annee_v'];
  $kilometre = $_POST['km_v'];
  $statut = $_POST['statut_v'];
  $type = $_POST['type_v'];
  $carburant = $_POST['carburant_v'];
  $couleur = $_POST['couleur_v'];
  $nb_portes = $_POST['nb_portes'];
  $nb_places = $_POST['nb_places'];
  $puissance_fiscale = $_POST['cv_v'];

  $donnees = array(
    0 => $id_v, 1 => $titre_v, 2 => $petite_description_v, 3 => $large_description_v, 4 => $marque, 5 => $modele, 6 => $prix, 7 => $img, 8 => $annee,
    9 => $kilometre, 10 => $statut, 11 => $id_v, 12 => $type, 13 => $carburant, 14 => $couleur, 15 => $nb_portes, 16 => $nb_places, 17 => $puissance_fiscale
  );
  $connection = new VoitureController();
  $voiture = $connection->modifierVoiture($donnees);
  sessionAlert('success', 'Voiture modifiée avec succès!');
  header('Location: index.php?page=administr');
}

//Update schedules
if (isset($_POST['modifierHoraires'])) {
  foreach ($_POST as $cle => $value) {

    if ($cle != 'modifierHoraires') {
      $modifications[] = $value;
    }
  }

  $connection = new HoraireController();
  $heure = $connection->changeHoraires($modifications);
  sessionAlert('success', 'Horaires modifiés avec succès!');
  header('Location: index.php?page=administr');
}


//Add service
if (isset($_POST['adPrestation'])) {

  $titre_p = $_POST['titre_p'];
  $petite_description_p = $_POST['petite_description_p'];
  $large_description_p = $_POST['large_description_p'];

  $donnees = array(0 => $titre_p, 1 => $petite_description_p, 2 => $large_description_p);
  $connection = new PrestationController();
  $prestation = $connection->ajouterPrestation($donnees);
  sessionAlert('success', 'Prestation ajoutée avec succès!');
  header('Location: index.php?page=administr');
}

//Add admin review
if (isset($_POST['addAvis'])) {

  $titre_a = $_POST['titre_a'];
  $nom_a = $_POST['nom_a'];
  $prenom_a = $_POST['prenom_a'];
  $commentaire_a = $_POST['commentaire_a'];
  $note = intval($_POST['note_a']);

  $donnees = array(0 => $titre_a, 1 => $commentaire_a, 2 => $nom_a, 3 => $prenom_a, 4 => $note);
  $connection = new AvisController();
  $avis = $connection->ajouterAvis($donnees);
  sessionAlert('success', 'Avis ajouté avec succès!');
  header('Location: index.php?page=administr');
}

//Action on lines: Validate/Invalidate a notice; Delete a user
foreach ($_POST as $cle => $value) {

  if (str_contains($cle, 'accept')) {
    $id = substr($cle, 6);
    $connection = new AvisManager($pdo);
    $accept = $connection->validAvis($id);
    header('Location: index.php?page=administr');
  }

  if (str_contains($cle, 'refuse')) {
    $id = substr($cle, 6);
    $connection = new AvisManager($pdo);
    $refuse = $connection->invalidAvis($id);
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'suppUser')) {
    $id = $_POST['idsuser' . substr($cle, 8)];
    $connection = new UserManager($pdo);
    $delete = $connection->suppUser($id);
    sessionAlert('success', 'Utilisateur supprimé avec succès!');
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'delete_v_')) {
    $id = substr($cle, 9);
    $connection = new VoitureManager($pdo);
    $delete = $connection->supprimerVoiture($id);
    sessionAlert('success', 'Voiture supprimée avec succès!');
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'supp_p_')) {
    $id = substr($cle, 7);
    $connection = new PrestationManager($pdo);
    $delete = $connection->supprimerPrestation($id);
    sessionAlert('success', 'Prestation supprimée avec succès!');
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'update_p_')) {
    $id = substr($cle, 9);
    $petite_description_p = $_POST['presta_petite_description_' . $id];
    $large_description_p = $_POST['presta_large_description_' . $id];
    $connection = new PrestationManager($pdo);
    $updt = $connection->modifierPrestation($id, $petite_description_p, $large_description_p);
    sessionAlert('success', 'Mises à jour prises en comptes!');
    header('Location: index.php?page=administr');
  }
}
