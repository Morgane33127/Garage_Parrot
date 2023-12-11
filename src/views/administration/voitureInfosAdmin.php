<div class="container margin-top">
      <div class="text-end m-2">
        <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getPrix(); ?>">
      </div>
      <div class=" row align-items-start">
        <div class="col-sm-7">
          <input type="text" class="form-control" name="titre_v" id=" titre_v" value="<?php echo $voiture->getTitre(); ?>">
          <input type="text" class="form-control" name="modele_v" id=" modele_v" value="<?php echo $voiture->getModele(); ?>">
          <textarea class="form-control" name="large_description_v" id="" maxlength="3000" rows="10"><?php echo $voiture->getLargeDescription(); ?></textarea>
          <p></p>
          <div class="row align-items-start">
            <div class="col-sm">
              <ul>
                <li>Marque : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getMarque(); ?>"></li>
                <li>Modèle : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getModele(); ?>"></li>
                <li>Année de mise en circulation : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getAnnee(); ?>"></li>
                <li>Km : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getKilometre(); ?>"></li>
                <li>Carburant : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getCarburant(); ?>"></li>
                <li>Boite de vitesse : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getType(); ?>"></li>
              </ul>
            </div>
            <div class="col-sm">
              <ul>
                <li>Nombre de portes : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getNbPortes(); ?>"></li>
                <li>Nombre de places : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getNbPlaces();; ?>"></li>
                <li>Puissance fiscale : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getPuissance(); ?>"></li>
                <li>Couleur : <input type="text" name="prix_v" id="prix_v" value="<?php echo $voiture->getCouleur(); ?>"></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <img src="public/assets/img/<?php echo $voiture->getImage(); ?>" alt="<?php echo $voiture->getImage(); ?>" style="max-width:100%;">
          <div class="my-2">
              <label for="fileToUpload" class="form-label">Changer l'image</label>
              <input class="form-control" type="file" id="fileToUpload" name="img">
            </div>
          <div class="text-end m-2">
            <button type="button" class="button">Vendu</button>
          </div>
        </div>
      </div>
    </div>