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
  file_put_contents('/config/log.txt', $message, FILE_APPEND);
}

/**
 * Verification of an email adress
 *
 * @param string $email
 *
 */
function verifMail(string $email)
{

  $expression = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

  if (preg_match($expression, $email)) {
    return $email;
  } else {
    echo "Cette adresse est invalide";
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
    echo "Entrée invalide";
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
  $from = "$from";
  $reply = "$from";
  //$destinataire = "v.parrot@example.com";
  $destinataire = "gut.morgane@gmail.com";
  $subject = "$subject";
  $message = "$message";
  $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
  $headers .= 'Reply-To: ' . $from . "\n"; // Mail de reponse
  $headers .= 'From: "Contact"<' . $reply . '>' . "\n"; // Expediteur
  $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire 

  // Envoi d'email
  try {
    mail($destinataire, $subject, $message, $headers);
    echo 'Votre message a été envoyé avec succès.';
    exit();
  } catch (error $e) {
    echo 'Impossible denvoyer des courriels. Veuillez réessayer.';
    error($e->getMessage());
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
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES[$filename]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Le fichier existe déjà.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES[$filename]["size"] > 500000) {
  echo "Taille est trop large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé, uniquement formats JPG, JPEG, PNG & GIF autorisés.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Le fichier n'a pas été téléversé.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
    echo "Le fichier ". htmlspecialchars( basename( $_FILES[$filename]["name"])). " a bien été téleversé.";

  } else {
    echo "Un problème est survenu.";
  }
}
}
