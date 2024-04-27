<div class="container-sm">
  <div class="login">
    <form action="<?php echo BASE_URL; ?>/login" method="POST">
      <div class="m-3">
        <a href="<?php echo BASE_URL; ?>">Revenir au site >></a>
      </div>
      <img src="<?php echo BASE_URL; ?>/public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot" width="90%">
      <div class="m-3">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <br>
        <input class="form-control input" type="email" name="email" placeholder="Login" required>
        <br>
        <input class="form-control input" type="password" name="password" placeholder="Mot de passe" minlength="8" required>
      </div>
      <br>
      <button class="button" type="submit" name="connect">Se connecter</button>
      <div class="m-3">
        <a href="<?php echo BASE_URL; ?>/forget">Mot de passe oublié ? <br> Changement de mot de passe ?</a>
      </div>
    </form>
  </div>
</div>