
<br><br><br><br><br><br><br><br><br>

<?php
require 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;
require './config/functions.php';
require './config/Database.php';
require 'config/autoload.php';
include_once './src/controllers/UserController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';
include_once './src/controllers/PrestationController.php';

$pdo = new Database();
$pdo = $pdo->getConnection();



//Deconnexion
if (isset($_POST['disconnect'])) {
  session_unset();
header("Location: login.php");
}

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
  header("Location: index.php?page=accueil");
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
  header("Location: index.php?page=vehicules");
}

//Ajouter un avis
if (isset($_POST['ajouteravis'])) {

  $nom_a = $_POST['nom'];
  $prenom_a = $_POST['prenom'];
  $commentaire_a = $_POST['message'];
  $note = $_POST['note'];
$titre_a = $_POST['titre'];

  $donnees = array(0=> $titre_a, 1=>$commentaire_a, 2=>$nom_a, 3=>$prenom_a, 4=>$note);
  $connection = new AvisController();
  $avis = $connection->ajouterAvis($donnees);
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

  $donnees = array(0=> $uuid, 1=>$prenom, 2=>$nom, 3=>$role, 4=>$login, 5=>$mdp);
  $connection = new UserController();
  $user = $connection->ajouterUser($donnees);

  header('Location: index.php?page=administr');
}

//Ajouter une voiture
if (isset($_POST['ajouterVoiture'])) {

  if(!empty($_FILES['img']['name'])){
  uploadFile('img');
  $img = $_FILES['img']['name'];
  if (file_exists("../public/assets/img/$img" === true)){
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

  $donnees = array(0=>$titre_v, 1=>$petite_description_v, 2=>$large_description_v, 3=>$marque, 4=>$modele, 5=>$prix, 6=>$img, 7=>$annee, 
  8=>$kilometre, 9=>$statut, 10=>$type, 11=>$carburant, 12=>$couleur, 13=>$nb_portes, 14=>$nb_places, 15=>$puissance_fiscale);

$connection = new VoitureController();
  $voiture = $connection->ajouterVoiture($donnees);

  header('Location: index.php?page=administr');
}

//Modifier une voiture

if (isset($_POST['modifier_une_voiture'])) {

  if(!empty($_FILES['img']['name'])){
  uploadFile('img');
  $img = $_FILES['img']['name'];
  if (file_exists("../public/assets/img/$img" === true)){
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


  $donnees = array(0=>$id_v, 1=>$titre_v, 2=>$petite_description_v, 3=>$large_description_v, 4=>$marque, 5=>$modele, 6=>$prix, 7=>$img, 8=>$annee, 
  9=>$kilometre, 10=>$statut, 11=> $id_v, 12=>$type, 13=>$carburant, 14=>$couleur, 15=>$nb_portes, 16=>$nb_places, 17=>$puissance_fiscale);
$connection = new VoitureController();
  $voiture = $connection->modifierVoiture($donnees);
  header('Location: index.php?page=administr');
}

//Modifier horaires
if (isset($_POST['modifierHoraires'])) {
  foreach ($_POST as $cle => $value) {

    if ($cle != 'modifierHoraires') {
      $modifications[] = $value;
    }
  }
  $connection = new HoraireController();
  $heure = $connection->changeHoraires($modifications);

  header('Location: index.php?page=administr');
}


//Ajouter prestation
if (isset($_POST['adPrestation'])) {

  $titre_p = $_POST['titre_p'];
  $petite_description_p = $_POST['petite_description_p'];
  $large_description_p = $_POST['large_description_p'];

  $donnees = array(0=> $titre_p, 1=>$petite_description_p, 2=>$large_description_p);

  $connection = new PrestationController();
  $prestation = $connection->ajouterPrestation($donnees);

  header('Location: index.php?page=administr');
}

//Ajouter avis admin
if (isset($_POST['addAvis'])) {

  $titre_a = $_POST['titre_a'];
  $nom_a = $_POST['nom_a'];
  $prenom_a = $_POST['prenom_a'];
  $commentaire_a = $_POST['commentaire_a'];
  $note = intval($_POST['note_a']);

  $donnees = array(0=> $titre_a, 1=>$commentaire_a, 2=>$nom_a, 3=>$prenom_a, 4=>$note);
  $connection = new AvisController();
  $avis = $connection->ajouterAvis($donnees);
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
  if (str_contains($cle, 'supp_p_')) {
    $id = substr($cle, 7);
    $connection = new PrestationManager($pdo);
    $delete = $connection->supprimerPrestation($id);
    header('Location: index.php?page=administr');
  }
  if (str_contains($cle, 'update_p_')) {
    $id = substr($cle, 9);
    $petite_description_p = $_POST['presta_petite_description_'.$id];
    $large_description_p = $_POST['presta_large_description_'.$id];
    $connection = new PrestationManager($pdo);
    $updt = $connection->modifierPrestation($id, $petite_description_p, $large_description_p);
    header('Location: index.php?page=administr');
  }
}
