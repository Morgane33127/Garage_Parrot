<div class="container-sm margin-top">
  <div class="text-end m-2">
    <h2 class="titre"><?php echo $voiture->getPrix() . "€"; ?></h2>
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
      <img src="<?php echo BASE_URL; ?>/public/assets/img/<?php echo $voiture->getImage(); ?>" alt="<?php echo $voiture->getTitre(); ?>, voiture, occasion" class="v_info" style="max-width:100%;">
    </div>
  </div>

  <div>
    <form method="POST" action="<?php echo BASE_URL; ?>/demande">
      <h4>Vous êtes interessé(e) ?</h4>
      <h5>Sujet : <?php echo $voiture->getTitre(); ?></h5>
      <input type="hidden" name="v_id" value='<?php echo $voiture->getId() . " : " . $voiture->getTitre(); ?>'>
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
      <button type="submit" class="button" name="contact_voiture">Etre recontacter</button>
    </form>
    <br>
    <h5>Ou directement :</h5>
    <p>Par téléphone au : <?php echo TELEPHONE; ?></p>
    <p>A notre adresse : <?php echo ADRESSE; ?></p>
  </div>

</div>

<?php
require 'footer.php';

