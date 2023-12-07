
<br><br><br><br><br><br><br><br><br>

<?php
require 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

require './config/functions.php';
require './config/Database.php';
require 'config/autoload.php';

$pdo = new Database();
$pdo = $pdo->getConnection();

//Demande contact
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

  // send email
  sendMail($mail, 'Contact', $message);
}

//Demande contact pour véhicule
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

  // send email
  sendMail($mail, $id_v, $message);
}

//Ajouter un avis
if (isset($_POST['ajouteravis'])) {

  $nom_a = $_POST['nom'];
  $prenom_a = $_POST['prenom'];
  $commentaire_a = $_POST['message'];
  $note = $_POST['note'];
$titre_a = $_POST['titre'];

  $donnees = array($nom_a, $prenom_a, $titre_a, $commentaire_a, $note);

  foreach ($donnees as $donnee) {
    verifData($donnee);
  }

  // Ajout BDD

  $avis = new Avis(0, $titre_a, $commentaire_a, $nom_a, $prenom_a, $note, 'En attente', '');
  $connection = new AvisManager($pdo);
  $avis = $connection->newAvis($avis);
  header('Location: index.php?page=avis');
}

//Ajouter un utilisateur
if (isset($_POST['ajouterUser'])) {
  $uuid = Uuid::uuid4()->toString();
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $role = $_POST['role'];
  $login = $_POST['email'];
  $mdp = $_POST['mdp'];
  $mdp = password_hash($mdp, PASSWORD_BCRYPT);
  $connection = new UserManager($pdo);
  $user = $connection->newUser($uuid, $prenom, $nom, $role, $login, $mdp);
  header('Location: index.php?page=administr');
}

//Ajouter une voiture
if (isset($_POST['ajouterVoiture'])) {

  $titre_v = $_POST['titre_v'];
  $petite_description_v = $_POST['petite_description'];
  $large_description_v = $_POST['large_description'];
  $marque = $_POST['marque_v'];
  $modele = $_POST['modele_v'];
  $prix = $_POST['prix_v'];
  //$img= $_POST['img'];
  $img = 'gvplogo.JPG';
  $annee = $_POST['annee_v'];
  $kilometre = $_POST['km_v'];
  $statut = 'Dispo';
  $type = $_POST['type_v'];
  $carburant = $_POST['carburant'];
  $couleur = $_POST['couleur_v'];
  $nb_portes = $_POST['nb_portes'];
  $nb_places = $_POST['nb_places'];
  $puissance_fiscale = $_POST['cv'];

  $voitureInfos = new VoitureInfos(0, $titre_v, $petite_description_v, $large_description_v, $marque, $modele, $prix, $img, $annee, $kilometre, $statut, 0, $type, $carburant, $couleur, $nb_portes, $nb_places, $puissance_fiscale);
  $connection = new VoitureManager($pdo);
  $voiture = $connection->newVoiture($voitureInfos);
  header('Location: index.php?page=administr');
}

//Modifier horaires
if (isset($_POST['modifierHoraires'])) {
  foreach ($_POST as $cle => $value) {

    if ($cle != 'modifierHoraires') {
      $modifications[] = $value;
    }
  }

  $connection = new HeureManager($pdo);
  $heure = $connection->changeHoraires($modifications);

  header('Location: index.php?page=administr');
}


//Ajouter prestation
if (isset($_POST['adPrestation'])) {

  $titre_p = $_POST['titre_p'];
  $petite_description_p = $_POST['petite_description_p'];
  $large_description_p = $_POST['large_description_p'];

  $prestation = new Prestation(0, $titre_p, $petite_description_p, $large_description_p);
  $connection = new PrestationManager($pdo);
  $prestation = $connection->ajouterPrestation($prestation);

  header('Location: index.php?page=administr');
}

//Ajouter avis admin
if (isset($_POST['addAvis'])) {

  $titre_a = $_POST['titre_a'];
  $nom_a = $_POST['nom_a'];
  $prenom_a = $_POST['prenom_a'];
  $commentaire_a = $_POST['commentaire_a'];
  $note = intval($_POST['note_a']);

  $avis = new Avis(0, $titre_a, $commentaire_a, $nom_a, $prenom_a, $note, 'En attente', '');
  $connection = new AvisManager($pdo);
  $avis = $connection->newAvis($avis);

  header('Location: index.php?page=administr');
}

//Action sur lignes : Valider/Invalider un avis ; Supprimer un utilisateur
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
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'delete_v_')) {
    $id = substr($cle, 9);
    $connection = new VoitureManager($pdo);
    $delete = $connection->supprimerVoiture($id);
    header('Location: index.php?page=administr');
  }
}
