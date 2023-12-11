<?php

class LoginController
{


  private $db;

  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  public function login()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connect'])) {
      $inputMail = $_POST['email'];
      $inputPassword = $_POST['password'];

      require 'config/functions.php';

      verifData($inputPassword);
      verifMail($inputMail);
      // Obtenir les détails de l'utilisateur à partir du modèle
      $user = new Auth($this->db);

      $stmt = $user->login($inputPassword, $inputMail);

      if (!empty($stmt)) {
        $id_u = $stmt->getId();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id_u;
        $_SESSION['infos'] = $stmt->getInfos();
        $_SESSION['role'] = $stmt->getRole();
        header("Location:index.php?page=administr&&user_id=$id_u");
      } else {
        echo "Identifiants invalides.";
      }
    }

    include './src/views/loginForm.php'; // Afficher la vue de connexion
  }
}
