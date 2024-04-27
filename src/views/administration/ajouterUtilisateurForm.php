<form method="POST" action="<?php echo BASE_URL; ?>/demande">
  <div class="row align-items-start">
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nom" placeholder="Nom*" required>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="prenom" placeholder="Prenom*" required>
    </div>
    <div class="col-sm-4">
      <select class="form-select" name="role">
        <option value="ADM">Admin</option>
        <option value="USR">User</option>
      </select>
    </div>
  </div>
  <div class="py-2">
    <input type="email" class="form-control" name="email" placeholder="Email*" required>
  </div>
  <div class="py-2">
    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe*" minlength="8" required>
  </div>
  <div>
    <button type="submit" class="button" name="ajouterUser">Ajouter</button>
  </div>
</form>