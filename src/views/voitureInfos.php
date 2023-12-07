<div class="container margin-top">
      <div class="text-end m-2">
        <h2><?php echo $voiture->getPrix() . "€"; ?></h2>
      </div>
      <div class=" row align-items-start">
        <div class="col-sm-7">
          <h3><?php echo $voiture->getTitre(); ?></h3>
          <p><?php echo $voiture->getModele(); ?></p>
          <p><?php echo $voiture->getLargeDescription(); ?></p>
          <div class="row align-items-start">
            <div class="col-sm">
              <ul>
                <li>Marque : <?php echo $voiture->getMarque(); ?></li>
                <li>Modèle : <?php echo $voiture->getModele(); ?></li>
                <li>Année de mise en circulation : <?php echo $voiture->getAnnee(); ?></li>
                <li>Km : <?php echo $voiture->getKilometre(); ?></li>
                <li>Carburant : <?php echo $voiture->getCarburant(); ?></li>
                <li>Boite de vitesse : <?php echo $voiture->getType(); ?></li>
              </ul>
            </div>
            <div class="col-sm">
              <ul>
                <li>Nombre de portes : <?php echo $voiture->getNbPortes(); ?></li>
                <li>Nombre de places : <?php echo $voiture->getNbPlaces(); ?></li>
                <li>Puissance fiscale : <?php echo $voiture->getPuissance(); ?></li>
                <li>Couleur : <?php echo $voiture->getCouleur(); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <img src="public/assets/img/<?php echo $voiture->getImage(); ?>" alt="<?php echo $voiture->getImage(); ?>" style="max-width:100%;">
          <div class="text-end m-2">
            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#voitureContact">Nous contacter</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <form method="POST" action="index.php?page=demande">
      <div class="modal fade" id="voitureContact" tabindex="-1" aria-labelledby="voitureContactLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="voitureContactLabel"><?php echo $voiture->getTitre(); ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="v_id" value=<?php echo $voiture->getId(); ?>>
              <p><?php echo $voiture->getModele(); ?></p>
              <p><?php echo $voiture->getPetiteDescription(); ?></p>
              <div>
                <div class="row align-items-start">
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom*" required>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="prenom" placeholder="Prenom*" required>
                  </div>
                  <div class="col-sm-4">
                    <input type="tel" class="form-control" name="tel" placeholder="Tel*" required>
                  </div>
                </div>
                <div class="py-2">
                  <input type="email" class="form-control" name="email" placeholder="Email*" required>
                </div>
                <div class="py-2">
                  <textarea class="form-control" name="message" placeholder="Message**" required></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="button" name="contact_voiture">Etre recontacter</button>
            </div>
          </div>
        </div>
      </div>
    </form>

