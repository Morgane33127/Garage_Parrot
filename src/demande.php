<?php

require './config/functions.php';

//Demande contact pour véhicule
if (isset($_POST['contact']) && !empty($_POST['v_id'])) {

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

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $message = $_POST['message'];
  $note = $_POST['note'];
  if (isset($_POST['titre'])) {
    $titre = $_POST['titre'];
  } else {
    $titre = 'Demande de contact';
  }
  $donnees = array($nom, $prenom, $titre, $message, $note);

  foreach ($donnees as $donnee) {
    verifData($donnee);
  }

  // Ajout BDD
  require_once 'model/AvisManager.php';
  require_once './config/db.php';
  $connection = new AvisManager($pdo);
  $avis = $connection->newAvis($titre, $message, $nom, $prenom, $note);
  header('Location: index.php?page=avis');
}
