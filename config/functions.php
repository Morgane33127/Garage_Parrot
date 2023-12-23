<?php

/**
 * Add error message in a text file.
 *
 * @param string $error,
 *
 */
function error(string $error)
{
  $message = date("d-m-Y H:i:s") . " : " . $error . "\n";
  file_put_contents('config/log.txt', $message, FILE_APPEND);
}

/**
 * Verification of an email adress
 *
 * @param string $email
 *
 */
function verifMail(string $email)
{

  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    return $email;
  } else {
    throw new Exception("E-mail invalide");
  }

  } 

/**
 * Verification of inputs
 *
 * @param string $donnees
 * @return string
 *
 */
function verifData(string $donnees) : string
{
  if (!empty($donnees)) {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees, ENT_SUBSTITUTE);
    return $donnees;
  } else {
    throw new Exception ("Entrée invalide");
  }
}

/**
 * Send an email to garage parrot
 *
 * @param string $from, $subject, $message
 *
 */
function sendMail($from, $subject, $message)
{

  //envoi du mail
  $from = $from;
  $reply = $from;
  //$destinataire = "v.parrot@example.com";
  $destinataire = "technique@a-2-s.com";
  $subject = $subject;
  $message = $message;
  $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
  $headers .= 'Reply-To: ' . $from . "\n"; // Mail de reponse
  $headers .= 'From: "Contact"<' . $reply . '>' . "\n"; // Expediteur
  $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire 

  // Envoi d'email
  $success = mail($destinataire, $subject, $message, $headers);
    if (!$success){
      throw new Exception("Impossible denvoyer des courriels. Veuillez réessayer.");
    }
}

/**
 * Send an email to user to reset password
 *
 * @param string $email
 *
 */
function forgetPswdMail($email, $id_u)
{

  //envoi du mail
  $from = 'v.parrot@example.com';
  $reply = 'v.parrot@example.com';
  $destinataire = $email;
  $subject = 'Reinitiatilisation de votre mot de passe';
  $message = 'Pour reinitaliser votre mot de passe veuillez-cliquer sur le lien suivant : http://garageparrot/Garage_Parrot/index.php?page=reset-password&id_u='.$id_u;
  $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
  $headers .= 'Reply-To: ' . $from . "\n"; // Mail de reponse
  $headers .= 'From: "Contact"<' . $reply . '>' . "\n"; // Expediteur
  $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire 

  // Envoi d'email
  $success = mail($destinataire, $subject, $message, $headers);
    if (!$success){
      throw new Exception("Impossible denvoyer des courriels. Veuillez réessayer.");
    }
}

/**
 * Upload a file
 *
 * @param $filename
 *
 */
function uploadFile($filename){
  $target_dir = "public/assets/img/";
  $target_file = $target_dir . basename($_FILES[$filename]["name"]);
  $uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES[$filename]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    throw new Exception("Le fichier n'est pas une image.");
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
  throw new Exception("Le fichier existe déjà.");
  $uploadOk = 0;
}

// Check file size
if ($_FILES[$filename]["size"] > 500000) {
  throw new Exception("Taille est trop large.");
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  throw new Exception("Désolé, uniquement formats JPG, JPEG, PNG autorisés.");
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  throw new Exception("Le fichier n'a pas été téléversé.");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
    echo "Le fichier ". htmlspecialchars( basename( $_FILES[$filename]["name"])). " a bien été téleversé.";

  } else {
    throw new Exception("Un problème est survenu.");
  }
}
}

/**
 * Display a session message
 *
 * @param string $type
 * @param string $msg
 *
 */
function sessionAlert($type, $msg){
  $_SESSION['alert'] = [
    "type" => "$type",
    "msg" => "$msg"
  ];
}
