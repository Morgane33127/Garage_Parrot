<?php

require_once './config/db.php';

?>
<div class="container-sm">
  <section>
    <h3>A propos du Garage V. Parrot</h3>
    <div class="container">
      <div class="row align-items-start">
        <div class="col-sm-6">
          <p>Bienvenue chez Garage V. Parrot, votre destination automobile de confiance pour des services de qualité et une expertise inégalée. Niché au cœur de notre communauté, notre petit garage est bien plus qu'un simple lieu de réparation automobile ; c'est un lieu où les passionnés se rencontrent et où chaque client est accueilli avec chaleur et professionnalisme.
            Chez Garage V. Parrot, nous mettons l'accent sur l'excellence dans chaque aspect de notre travail. Notre équipe qualifiée de mécaniciens expérimentés est dédiée à assurer la santé optimale de votre véhicule, que ce soit pour des réparations, des entretiens réguliers ou des diagnostics approfondis. Nous comprenons l'importance de votre sécurité et de celle de votre voiture, c'est pourquoi nous nous engageons à fournir des services fiables et efficaces.
            Notre atmosphère conviviale et notre service personnalisé font de chaque visite chez Garage V. Parrot une expérience agréable. Nous sommes fiers de créer des relations durables avec nos clients, en offrant des conseils honnêtes et des solutions adaptées à leurs besoins spécifiques.
            Que vous soyez à la recherche d'une simple vidange d'huile, de la réparation de problèmes mécaniques complexes ou même de conseils sur l'entretien préventif, Garage V. Parrot est là pour répondre à toutes vos demandes. Nous croyons en la transparence, en fournissant des devis clairs et en expliquant chaque étape du processus pour que nos clients se sentent en confiance à chaque étape.
            Faites confiance à Garage V. Parrot pour prendre soin de votre voiture comme si c'était la nôtre. Nous sommes passionnés par l'automobile et déterminés à vous offrir le meilleur service possible. Visitez-nous aujourd'hui et découvrez la différence Garage V. Parrot.</p>
        </div>
        <div class="col-sm-6">
          <img src="../public/assets/img/garage.jpg" alt="" width="100%">
        </div>
      </div>
    </div>
  </section>

  <section>
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
</div>

<?php
require_once 'footer.php';
