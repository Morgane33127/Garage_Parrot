<?php

$v_id = $_GET['id'];

try {
  if (!empty($v_id)) {
    require_once 'src/model/CarInfos.php';
    require_once 'config/db.php';
    $connection = new CarInfos($pdo);
    $voiture = $connection->affichageInfos($v_id);

?>

    <div class="container p-2">
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
          <img src="../public/assets/img/<?php echo $voiture->getImage(); ?>" alt="<?php echo $voiture->getImage(); ?>" style="max-width:100%;">
          <div class="text-end m-2">
            <button type="button">Nous contacter</button>
          </div>
        </div>
      </div>
    </div>


<?php
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  file_put_contents("../config/error.txt", $exception->getMessage());
  die($exception->getMessage());
}

require_once 'footer.php';
