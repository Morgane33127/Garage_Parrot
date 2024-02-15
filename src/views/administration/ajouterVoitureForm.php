<form method="POST" action="index.php?page=demande" enctype="multipart/form-data">
  <div class="row align-items-start my-2">
    <div class="col-sm-4">
      <input type="text" class="form-control" name="titre_v" placeholder="Titre*" required>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="marque_v" placeholder="Marque*" required>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="modele_v" placeholder="Modele*" required>
    </div>
  </div>
  <div class="row align-items-start my-2">
    <div class="col-sm-4">
      <input type="number" class="form-control" name="prix_v" placeholder="Prix*" minlength="1" step="0.0001" required>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="annee_v" placeholder="Année*" maxlength="4" required>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="km_v" placeholder="Km*" required>
    </div>
  </div>
  <div class="row align-items-start my-2">
    <div class="col-sm-4">
      <select class="form-select" name="type_v" id="type_v" aria-label="type_v" aria-describedby="basic-addon5">
        <option value="">Type*</option>
        <option value="Manuelle">Manuelle</option>
        <option value="Automatique">Automatique</option>
      </select>
    </div>
    <div class="col-sm-4">
      <select class="form-select" name="carburant">
        <option value="">Carburant*</option>
        <option value="Essence">Essence</option>
        <option value="Diesel">Diesel</option>
        <option value="Hybride">Hybride</option>
        <option value="Electrique">Electrique</option>
      </select>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="couleur_v" placeholder="Couleur*" required>
    </div>
  </div>
  <div class="row align-items-start my-2">
    <div class="col-sm-4">
      <input type="number" class="form-control" name="nb_portes" minlength="1" placeholder="Nombre de portes*" required>
    </div>
    <div class="col-sm-4">
      <input type="number" class="form-control" name="nb_places" minlength="1" placeholder="Nombre de places*" required>
    </div>
    <div class="col-sm-4">
      <input type="number" class="form-control" name="cv" minlength="1" placeholder="CV*" required>
    </div>
  </div>
  <div class="my-2">
    <input type="text" class="form-control" name="petite_description" placeholder="Petite description*" required>
  </div>
  <div class="my-2">
    <textarea class="form-control" name="large_description" placeholder="Large description*"></textarea>
  </div>
  <div class="my-2">
    <label for="fileToUpload" class="form-label">Sélectionner une image</label>
    <input class="form-control" type="file" id="fileToUpload" name="img">
  </div>
  <button type="submit" class="button" name="ajouterVoiture">Ajouter une voiture</button>
</form>
<div class="tab-pane fade" id="hours-tab-pane" role="tabpanel" aria-labelledby="hours-tab" tabindex="0">
  <h3><?php echo $titre3; ?></h3>
  <form method="POST" action="index.php?page=demande">
    <div class="col-2">
      <?php echo $content3; ?>
    </div>
    <div class="m-2">
      <button type="submit" class="button" name="modifierHoraires">Modifier horaires</button>
    </div>
  </form>
</div>