<div class="container-fluid" id="div" style="margin-top:150px;">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="cars-tab" data-bs-toggle="tab" data-bs-target="#cars-tab-pane" type="button" role="tab" aria-controls="cars-tab-pane" aria-selected="false">Voitures</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="avis-tab" data-bs-toggle="tab" data-bs-target="#avis-tab-pane" type="button" role="tab" aria-controls="avis-tab-pane" aria-selected="false">Avis</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="cars-tab-pane" role="tabpanel" aria-labelledby="cars-tab" tabindex="0">
  <h3><?php echo $titre2; ?></h3>
  <div class="row">
      <div class="col-sm-8">
        <form method="POST" action="index.php?page=demande">
          <?php echo $content2; ?>
        </form>
      </div>
      <div class="col-sm-4">
        <form method="POST" action="index.php?page=demande" enctype="multipart/form-data">
          <h4>Ajouter une voiture</h4>
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
              <input type="text" class="form-control" name="type_v" placeholder="Type">
            </div>
            <div class="col-sm-4">
              <select class="form-select" name="carburant">
                <option value="">Carburant</option>
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybride">Hybride</option>
                <option value="Electrique">Electrique</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="couleur_v" placeholder="Couleur">
            </div>
          </div>
          <div class="row align-items-start my-2">
            <div class="col-sm-4">
              <input type="number" class="form-control" name="nb_portes" placeholder="Nombre de portes">
            </div>
            <div class="col-sm-4">
              <input type="number" class="form-control" name="nb_places" placeholder="Nombre de places">
            </div>
            <div class="col-sm-4">
              <input type="number" class="form-control" name="cv" placeholder="CV">
            </div>
          </div>
          <div class="my-2">
            <input type="text" class="form-control" name="petite_description" placeholder="Petite description*" required>
          </div>
          <div class="my-2">
            <textarea class="form-control" name="large_description" placeholder="Large description"></textarea>
          </div>
          <div class="my-2">
              <label for="fileToUpload" class="form-label">Sélectionner une image</label>
              <input class="form-control" type="file" id="fileToUpload" name="img">
            </div>
          <button type="submit" class="button" name="ajouterVoiture">Ajouter une voiture</button>
        </form>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="avis-tab-pane" role="tabpanel" aria-labelledby="avis-tab" tabindex="0">
  <h3><?php echo $titre5; ?></h3>
    <div class="row">
      <div class="col-8">
        <form method="POST" action="index.php?page=demande">
          <div class="row">
            <?php echo $content5; ?>
          </div>
        </form>
      </div>
      <div class="col-4">
        <form method="POST" action="index.php?page=demande">
          <h4>Ajouter un avis</h4>
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
      </div>
    </div>
  </div>
</div>
</div>