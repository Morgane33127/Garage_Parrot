<div class="container-fluid" id="div" style="margin-top:150px;">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="uti-tab" data-bs-toggle="tab" data-bs-target="#uti-pane" type="button" role="tab" aria-controls="uti-tab-pane" aria-selected="true">Utilisateurs</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="voitures-tab" data-bs-toggle="tab" data-bs-target="#voitures-tab-pane" type="button" role="tab" aria-controls="voitures-tab-pane" aria-selected="false">Voitures à la vente</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="horaires-tab" data-bs-toggle="tab" data-bs-target="#horaires-tab-pane" type="button" role="tab" aria-controls="horaires-tab-pane" aria-selected="false">Horaires</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="prestations-tab" data-bs-toggle="tab" data-bs-target="#prestations-tab-pane" type="button" role="tab" aria-controls="prestations-tab-pane" aria-selected="false">Prestations</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="avis-tab" data-bs-toggle="tab" data-bs-target="#avis-tab-pane" type="button" role="tab" aria-controls="avis-tab-pane" aria-selected="false">Avis à vérifier</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="demandes-tab" data-bs-toggle="tab" data-bs-target="#demandes-tab-pane" type="button" role="tab" aria-controls="demandes-tab-pane" aria-selected="false">Nouvelles demandes</button>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="uti-tab-pane" role="tabpanel" aria-labelledby="uti-tab" tabindex="0">
      <h3><?php echo $titre1; ?></h3>
      <div class="row">
        <div class="col-8">
          <form method="POST" action="index.php?page=demande">
            <table class="table">
              <tr>
                <th>Prenom Nom</th>
                <th>Role</th>
                <th>Mail</th>
                <th>Action</th>
              </tr>
              <?php echo $content1; ?>
            </table>
          </form>
        </div>
        <div class="col-4">
          <h4>Ajouter un utilisateur</h4>
          <form method="POST" action="index.php?page=demande">
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
              <input type="password" class="form-control" name="mdp" placeholder="Mot de passe*" required>
            </div>
            <div>
              <button type="submit" class="button" name="ajouterUser">Ajouter</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="voitures-tab-pane" role="tabpanel" aria-labelledby="voitures-tab" tabindex="0">
  <h3><?php echo $titre2; ?></h3>
  <div class="row">
      <div class="col-8">
        <form method="POST" action="index.php?page=demande">
          <?php echo $content2; ?>
        </form>
      </div>
      <div class="col-4">
        <form method="POST" action="index.php?page=demande">
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
          <!--<div class="my-2">
              <label for="formFile" class="form-label">Sélectionner une image</label>
              <input class="form-control" type="file" id="formFile" name="img">
            </div>-->
          <button type="submit" class="button" name="ajouterVoiture">Ajouter une voiture</button>
        </form>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="horaires-tab-pane" role="tabpanel" aria-labelledby="horaires-tab" tabindex="0">
    <h3><?php echo $titre3; ?></h3>
    <form method="POST" action="index.php?page=demande">
      <div>
        <?php echo $content3; ?>
      </div>
      <button type="submit" class="button" name="modifierHoraires">Modifier horaires</button>
    </form>
  </div>

  <div class="tab-pane fade" id="prestations-tab-pane" role="tabpanel" aria-labelledby="prestations-tab" tabindex="0">
    <h3><?php echo $titre4; ?></h3>
    <form method="POST" action="index.php?page=demande">
      <div class="row">
        <div class="col-8">
          <?php echo $content4; ?>
        </div>
        <div class="col-4">
          <h4>Ajouter une prestation</h4>
          <div class="my-2">
            <input type="text" class="form-control" name="titre_p" placeholder="Titre*" required>
          </div>
          <div class="my-2">
            <input type="text" class="form-control" name="petite_description_p" placeholder="Petite description*" required>
          </div>
          <div class="my-2">
            <textarea class="form-control" name="large_description_p" placeholder="Large description*" required></textarea>
          </div>
          <div class="my-2 text-end">
            <button type="submit" class="button" name="adPrestation">Ajouter</button>
          </div>

        </div>
      </div>
    </form>
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

  <div class="tab-pane fade" id="demandes-tab-pane" role="tabpanel" aria-labelledby="demandes-tab" tabindex="0">
    <h3><?php echo $titre6; ?></h3>
    <form method="POST" action="index.php?page=demande">
      <div>
        <?php echo $content6; ?>
      </div>
    </form>
  </div>

</div>