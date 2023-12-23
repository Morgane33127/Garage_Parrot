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

    // Vérification CSRF
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        error('Erreur CSRF !');
        sessionAlert('danger', 'Erreur CSRF !');
      }
    }

    // Générer un nouveau jeton CSRF
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Vérification des informations d'identification
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connect'])) {
      $inputMail = $_POST['email'];
      $inputPassword = $_POST['password'];

      try {
        verifData($inputPassword);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      try {
        verifMail($inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Obtenir les détails de l'utilisateur à partir du modèle
      $user = new Auth($this->db);

      try {
        $stmt = $user->login($inputPassword, $inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Authentification réussie
      if (!empty($stmt)) {
        $id_u = $stmt->getId();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id_u;
        $_SESSION['infos'] = $stmt->getInfos();
        $_SESSION['role'] = $stmt->getRole();
        header("Location:index.php?page=administr&user_id=$id_u");
      }
    }

    include './src/views/loginForm.php'; // Afficher la vue de connexion
  }

  public function forgetPswd()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Envoyer'])) {
      $inputMail = $_POST['email'];

      try {
        verifMail($inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Verification mail en bdd
      $user = new Auth($this->db);

      try {
        $stmt = $user->verifMail($inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Authentification réussie
      if (!empty($stmt)) {
        $email = $stmt->getMail();
        $id_u = $stmt->getId();
        forgetPswdMail($email, $id_u);
        header("Location:index.php?page=login");
      }
    }
    include './src/views/mdpOublieView.php'; // Afficher la vue de connexion
  }

  public function newPswd()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Valider'])) {
      $password1 = $_POST['password1'];
      $password2 = $_POST['password2'];
      $id_u = $_GET['id_u'];

        $user = new Auth($this->db);
        try {
          $stmt = $user->changemdp($id_u, $password1, $password2);
          sessionAlert('success', 'Mot de passe réinitialisé avec succès!');
          header("Location: index.php?page=login");
        } catch (Exception $exception) {
          $msg = $exception->getMessage();
          error($msg);
          sessionAlert('danger', $msg);
          header("Location: index.php?page=login");
        }
      }
    
    include './src/views/forgetPswdView.php'; // Afficher la vue de connexion
  }
}
