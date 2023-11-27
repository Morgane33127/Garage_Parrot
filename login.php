<?php

require_once 'src/header.php';
require_once 'config/functions.php';

try {
  if (isset($_POST['connect'])) {
    require_once 'src/model/UserLogin.php';
    require_once 'config/db.php';
    $login = new UserLogin($pdo);
    $inputMail = $_POST['email'];
    $inputPassword = $_POST['password'];
    $user = $login->connect($inputPassword, $inputMail);
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}

?>
<div class="container-sm">
  <div class="login">
    <form action="#" method="POST">
      <div class="m-3">
        <a href="../index.php">Revenir au site >></a>
      </div>
      <img src="../public/assets/img/gvplogo.jpg" alt="Logo Garge V. Parrot" width="350px;">
      <div class="m-3">
        <input class="form-control input" type="email" name="email" placeholder="Login" required>
        <br>
        <input class="form-control input" type="password" name="password" placeholder="Mot de passe" minlength="8" required>
      </div>
      <br>
      <button class="connect" type="submit" name="connect">Se connecter</button>
      <div class="m-3">
        <a href="#">Mot de passe oublié ?</a>
      </div>
    </form>
  </div>
</div>