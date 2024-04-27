<form method="POST" action="<?php echo BASE_URL; ?>/demande">
  <div class="my-2">
    <input type="text" class="form-control" name="titre_a" placeholder="Titre*" required>
  </div>
  <div class="my-2">
    <input type="text" class="form-control" name="nom_a" placeholder="Nom*" required>
  </div>
  <div class="my-2">
    <input type="text" class="form-control" name="prenom_a" placeholder="Prenom*" required>
  </div>
  <div class="my-2">
    <textarea class="form-control" name="commentaire_a" placeholder="Commentaire*" required></textarea>
  </div>
  <div class="col-sm-4">
    <select class="form-select" name="note_a">
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>
    </select>
  </div>
  <div class="my-2 text-end">
    <button type="submit" class="button" name="addAvis">Ajouter</button>
  </div>
</form>