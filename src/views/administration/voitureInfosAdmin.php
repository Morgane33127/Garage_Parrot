<form method="POST" action="<?php echo BASE_URL; ?>/demande" enctype="multipart/form-data">
  <div class="container-sm margin-top">
  <a href="<?php echo BASE_URL; ?>/administration/voitures" class="link"><< Revenir page précédente</a>
    <div class=" row align-items-start">
      <div class="col-sm-7">
        <input type="hidden" class="form-control" name="id_v" id=" id_v" value="<?php echo $voiture->getId(); ?>">
        <input type="text" class="form-control" name="titre_v" id=" titre_v" value="<?php echo $voiture->getTitre(); ?>">
        <input type="text" class="form-control" name="petite_description_v" id=" petite_description_v" value="<?php echo $voiture->getPetiteDescription(); ?>">
        <textarea class="form-control" name="large_description_v" id="" maxlength="3000" rows="10"><?php echo $voiture->getLargeDescription(); ?></textarea>
        <p></p>
        <div class="row align-items-start">
          <div class="col-sm">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Marque</span>
              <input type="text" name="marque_v" id="marque_v" class="form-control" value="<?php echo $voiture->getMarque(); ?>" aria-label="marque_v" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon2">Modele</span>
              <input type="text" name="modele_v" id="modele_v" class="form-control" value="<?php echo $voiture->getModele(); ?>" aria-label="modele_v" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon3">Année</span>
              <input type="text" name="annee_v" id="annee_v" class="form-control" value="<?php echo $voiture->getAnnee(); ?>" aria-label="annee_v" aria-describedby="basic-addon3" maxlength="4">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon4">kilométrage</span>
              <input type="text" name="km_v" id="km_v" class="form-control" value="<?php echo $voiture->getKilometre(); ?>" aria-label="km_v" aria-describedby="basic-addon4">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon5">Carburant</span>
              <select class="form-select" name="carburant_v" id="carburant_v" aria-label="carburant_v" aria-describedby="basic-addon5">
                <option value="<?php echo $voiture->getCarburant(); ?>"><?php echo $voiture->getCarburant(); ?></option>
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybride">Hybride</option>
                <option value="Electrique">Electrique</option>
              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon6">Type</span>
              <select class="form-select" name="type_v" id="type_v" aria-label="type_v" aria-describedby="basic-addon5">
                <option value="<?php echo $voiture->getType(); ?>"><?php echo $voiture->getType(); ?></option>
                <option value="Manuelle">Manuelle</option>
                <option value="Automatique">Automatique</option>
              </select>
            </div>
          </div>
          <div class="col-sm">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon7">Nb portes</span>
              <input type="number" name="nb_portes" id="nb_portes" class="form-control" minlength="1" value="<?php echo $voiture->getNbPortes(); ?>" aria-label="nb_portes" aria-describedby="basic-addon7">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon8">Nb places</span>
              <input type="number" name="nb_places" id="nb_places" class="form-control" minlength="1" value="<?php echo $voiture->getNbPlaces(); ?>" aria-label="nb_places" aria-describedby="basic-addon8">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon9">Puissance fiscale</span>
              <input type="number" name="cv_v" id="cv_v" class="form-control" minlength="1" value="<?php echo $voiture->getPuissance(); ?>" aria-label="cv_v" aria-describedby="basic-addon9">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon10">Couleur</span>
              <input type="text" name="couleur_v" id="couleur_v" class="form-control" value="<?php echo $voiture->getCouleur(); ?>" aria-label="couleur_v" aria-describedby="basic-addon10">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon11">Prix</span>
              <input type="text" name="prix_v" id="prix_v" class="form-control" value="<?php echo $voiture->getPrix(); ?>" aria-label="prix_v" aria-describedby="basic-addon11">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon12">Statut</span>
              <select class="form-select" name="statut_v" id="statut_v" aria-label="statut_v" aria-describedby="basic-addon5">
                <option value="<?php echo $voiture->getStatut(); ?>"><?php echo $voiture->getStatut(); ?></option>
                <option value="Dispo">Dispo</option>
                <option value="Vendu">Vendue</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <img src="<?php echo BASE_URL; ?>/public/assets/img/<?php echo $voiture->getImage(); ?>" alt="<?php echo $voiture->getImage(); ?>" style="max-width:100%;">
        <input type="hidden" class="form-control" name="img_v" id=" img_v" value="<?php echo $voiture->getImage(); ?>">
        <div class="my-2">
          <label for="fileToUpload" class="form-label">Changer l'image</label>
          <input class="form-control" type="file" id="fileToUpload" name="img">
        </div>
        <div class="text-end m-2">
          <button type="submit" class="button" name="modifier_une_voiture">Modifier</button>
        </div>
      </div>
    </div>
  </div>
</form>