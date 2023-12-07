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
  file_put_contents('/config/error.txt', $message, FILE_APPEND);
}

function verifMail($email)
{

  $expression = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

  if (preg_match($expression, $email)) {
    return $email;
  } else {
    echo "Cette adresse est invalide";
  }
}

function verifData($donnees)
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
