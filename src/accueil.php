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
            professionnalisme. <a href="apropos.php">En savoir plus >></a></p>
          <div>
            <a href="contact.php"><button style="border-radius:30px; height:50px" type="button">Nous contacter</button></a>
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
        $presta = $pdo->query("SELECT * FROM prestations");
        foreach ($presta as $row) {
          $nom = $row['nom_p'];
          $pteDescription = $row['petite_description_p'];
        ?>
          <div class="col-sm-4 p-3">
            <a href="prestations.php">
              <button type="submit" class="prestation-card">
                <h4><?php echo $nom; ?></h4>
                <p><?php echo $pteDescription; ?></p>
                <p>En savoir plus >></p>
              </button>
            </a>
          </div>
        <?php
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
          <h3 style="margin-top:50%">Experience</h3>
        </div>
        <div class="col-sm valeur">
          <h3 style="margin-top:50%">Rapidité</h3>
        </div>
        <div class="col-sm valeur">
          <h3 style="margin-top:50%">Satisfaction client</h3>
        </div>
        <div class="col-sm valeur">
          <h3 style="margin-top:50%">Qualité</h3>
        </div>
        <div class="col-sm valeur">
          <h3 style="margin-top:50%">Couts</h3>
        </div>
      </div>
    </div>
  </section>

  <section id="Avis">
    <h3>Nos avis clients</h3>
    <div class="container-sm text-center">
      <div class="row align-items-start">
        <?php
        $avis = $pdo->query("SELECT * FROM avis ORDER BY dt_a DESC");
        foreach ($avis as $row) {
          $titre = $row['titre_a'];
          $comment = $row['commentaire_a'];
          $dt = $row['dt_a'];
          $nom = $row['visiteur_nom'];
          $prenom = $row['visiteur_prenom'];
          $note = $row['note_a'];
          $star = str_repeat('&#x2605;', $note);
        ?>
          <div class="col-sm-4">
            <div class="card-avis">
              <div style="display: flex; justify-content: space-between; flex-wrap: nowrap;flex-direction: row;">
                <b><?php echo $titre; ?></b>
                <p><small><?php echo $dt; ?></small></p>
              </div>

              <p style="color: #EDDB35;"><?php echo $star; ?></p>
              <p><?php echo $comment; ?></p>
              <p><?php echo $prenom . " " . $nom; ?></p>
            </div>
          </div>
        <?php
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
        $voitures = $pdo->query("SELECT * FROM voitures LIMIT 2");
        foreach ($voitures as $row) {
          $titre = $row['titre_v'];
          $description = $row['petite_description_v'];
          $img = '../public/assets/img/' . $row['img'];
          $prix = number_format($row['prix'], 0, ',', ' ');
        ?>
          <div class="voiture-card">
            <div>
              <h5><?php echo $titre; ?></h5>
              <p><?php echo $description; ?></p>
              <button class="button-style">
                <h3><?php echo $prix . "€"; ?><h3>
              </button>
              <a href=" #">En savoir plus >></a>
            </div>
            <div>
              <img src="<?php echo $img; ?>" alt="Logo Garge V. Parrot" style="height:150px;">
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div style="text-align: center; margin:20px;">
      <a class="button-style" href="vehicules.php">Voir +</a>
    </div>
  </section>

</div>

<?php

require 'footer.php';
