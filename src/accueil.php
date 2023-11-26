<?php

require_once './config/db.php';

?>
<div class="container-sm">

  <section id="presentation">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-sm">
          <img src="../public/assets/img/garage.jpg" alt="photo garage v parrot" style="width:500px;">
        </div>
        <div class="col-sm">
          <h3>Présentation</h3>
          <p>Bienvenue chez Garage V. Parrot, votre partenaire automobile de
            confiance. Notre petit garage offre des services de réparation et
            d'entretien avec une équipe dévouée de mécaniciens expérimentés.
            En plus de nos services, nous proposons également des voitures
            d'occasion de qualité, adaptées à tous les besoins. Nous priorisons la
            transparence, fournissant des devis clairs et des conseils honnêtes.
            Chez nous, chaque client est accueilli chaleureusement dans une
            atmosphère conviviale. Confiez-nous votre voiture, et nous nous
            engageons à assurer son bon fonctionnement avec
            professionnalisme. <a href="index.php?page=apropos" class="link">En savoir plus >></a></p>
          <div>
            <a href="index.php?page=contact"><button type="button">Nous contacter</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="prestations">
    <h3>Nos prestations</h3>
    <div class="container text-center">
      <div class="row align-items-start">
        <?php
        try {
          require_once 'src/model/PrestationManager.php';
          require_once 'config/db.php';
          $connection = new PrestationManager($pdo);
          $prestation = $connection->affichageInfos();

          $i = 0;
          foreach ($prestation as $row) {
            $nom = $row->getNom();
            $pteDescription = $row->getPetiteDescription();
            $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
        ?>
            <div class="col-sm-4 p-3">
              <a href="index.php?page=prestations">
                <button type="submit" class="prestation-card">
                  <h4><i class="<?php echo $icons[$i]; ?>"></i></h4>
                  <h4><?php echo $nom; ?></h4>
                  <p><?php echo $pteDescription; ?></p>
                  <p>En savoir plus >></p>
                </button>
              </a>
            </div>
        <?php
            $i++;
          }
        } catch (error $e) {
          file_put_contents("../config/error.txt", $e->getMessage(), FILE_APPEND);
        }
        ?>
      </div>
    </div>
  </section>

  <section id="valeurs">
    <h3>Nos valeurs</h3>
    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col-sm valeur">
          <h3>Experience</h3>
        </div>
        <div class="col-sm valeur">
          <h3>Rapidité</h3>
        </div>
        <div class="col-sm valeur">
          <h3>Coûts</h3>
        </div>
        <div class="col-sm valeur">
          <h3>Qualité</h3>
        </div>
        <div class="col-sm valeur">
          <h3>Satisfaction client</h3>
        </div>
      </div>
    </div>
  </section>

  <section id="Avis">
    <h3>Nos avis clients</h3>
    <div class="container-sm text-center">
      <div class="row align-items-start">
        <?php
        try {
          require_once 'src/model/AvisManager.php';
          require_once 'config/db.php';
          $connection = new AvisManager($pdo);
          $avis = $connection->affichageAvis(2);

          foreach ($avis as $row) {
            $titre = $row->getTitre();
            $comment = $row->getCommentaire();
            $dt = $row->getDate();
            $visiteur = $row->getInfosVisiteur();
            $note = $row->getNote();
            $star = str_repeat('&#x2605;', $note);
        ?>
            <div class="col-sm-4">
              <div class="card-avis">
                <div class="flex">
                  <b><?php echo $titre; ?></b>
                  <p><small><?php echo $dt; ?></small></p>
                </div>
                <p style="color: #EDDB35;"><?php echo $star; ?></p>
                <p><?php echo $comment; ?></p>
                <p><?php echo $visiteur; ?></p>
              </div>
            </div>
        <?php
          }
        } catch (error $e) {
          file_put_contents("./config/error.txt", $e->getMessage(), FILE_APPEND);
        }
        ?>
      </div>
    </div>
  </section>

  <section id="voitures">
    <h3>Nos véhicules d'occasions</h3>
    <div class="container">
      <div class="row align-items-start">
        <?php
        try {
          require_once 'src/model/CarInfos.php';
          require_once 'config/db.php';
          $connection = new CarInfos($pdo);
          $voitures = $connection->affichageVoitures(2);
          foreach ($voitures as $row) {
            $titre = $row->getTitre();
            $description = $row->getPetiteDescription();
            $img = '../public/assets/img/' . $row->getImage();
            $prix = number_format($row->getPrix(), 0, ',', ' ');
        ?>
            <div class="voiture-card">
              <div>
                <h5><?php echo $titre; ?></h5>
                <p><?php echo $description; ?></p>
                <button>
                  <h3><?php echo $prix . "€"; ?><h3>
                </button>
                <a href=" #" class="link">En savoir plus >></a>
              </div>
              <div>
                <img src="<?php echo $img; ?>" alt="Logo Garge V. Parrot" style="height:150px;">
              </div>
            </div>
        <?php
          }
        } catch (error $e) {
          file_put_contents("./config/error.txt", $e->getMessage() . "\n", FILE_APPEND);
        }
        ?>
      </div>
    </div>
    <div class="action-sup">
      <a href="index.php?page=vehicules"><button>Voir +</button></a>
    </div>
  </section>

</div>

<?php

require 'footer.php';
