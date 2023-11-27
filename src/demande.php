<?php

if (isset($_POST['contact']) && empty($_POST['v_id'])) {

  $id_v = $_POST['v_id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['email'];
  $message = $_POST['message'];
  $tel = $_POST['tel'];

  // send email
  mail("morgane.gutierrez33@gmail.com", $id_v, $mssage);
  header('Location: index.php?page=vehicules');
}
