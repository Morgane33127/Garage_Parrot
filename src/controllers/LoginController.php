<?php

/**
 * Controller for connexion to admin space and reset password
 *
 * @author Morgane G.
 */

class LoginController
{

  private $db;

  /**
   * Constructor
   *
   */
  public function __construct()
  {
    $this->db = new Database();
    $this->db = $this->db->getConnection();
  }

  /**
   * Connexion to admin space
   *
   * Redirection to page administr
   */
  public function login()
  {

    // CSRF Vérification 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        error('Erreur CSRF !');
        sessionAlert('danger', 'Erreur CSRF !');
      }
    }

    // New token CSRF
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Checking  identification informations
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

      // Get user details from template
      $user = new Auth($this->db);

      try {
        $stmt = $user->login($inputPassword, $inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Authentication successful
      if (!empty($stmt)) {
        $id_u = $stmt->getId();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id_u;
        $_SESSION['infos'] = $stmt->getInfos();
        $_SESSION['role'] = $stmt->getRole();
        header("Location:index.php?page=administr&user_id=$id_u");
      }
    }

    //Show login view
    include './src/views/loginForm.php';
  }

  /**
   * For password forgotten or to change. A link is send to the email entered IF the email is in the database.
   *
   */
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

      //Email verification in database
      $user = new Auth($this->db);

      try {
        $stmt = $user->verifMail($inputMail);
      } catch (Exception $exception) {
        $msg = $exception->getMessage();
        error($msg);
        sessionAlert('danger', $msg);
        header("Location: index.php?page=login");
      }

      // Authentication successful
      if (!empty($stmt)) {
        $email = $stmt->getMail();
        $id_u = $stmt->getId();
        forgetPswdMail($email, $id_u);
        header("Location:index.php?page=login");
      }
    }
    //Show login view
    include './src/views/mdpOublieView.php';
  }

  /**
   * The user is redirected to the reset page to change his password.
   *
   */
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
    //Show login view
    include './src/views/forgetPswdView.php';
  }
}
