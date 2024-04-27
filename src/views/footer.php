<footer>

  <div class="container-sm">
    <div class="row align-items-start">
      <div class="col-sm-2 display-none">
        <img src="<?php echo BASE_URL;?>/public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot, garage, automobile, voitures, réparation, entretien, vidange" width="150px;">
      </div>
      <div class="col-sm-10">
        <b>A propos</b>
        <p>Bienvenue chez Garage V. Parrot, votre partenaire automobile de confiance.
          Notre petit garage offre des services de réparation et d'entretien avec une équipe
          dévouée de mécaniciens expérimentés. Profitez de notre expertise et de notre atmosphère conviviale pour
          prendre soin de votre véhicule.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row align-items-start">
      <div class="col-sm-4">
        <p>
          <?php echo $horaires; ?>
        </p>
      </div>
      <div class="col-sm-8">
        <div class="row align-items-start">
          <div class="col-sm-4">
            <p>
              <a href="<?php echo BASE_URL . '/'; ?>" class="white">Accueil</a><br>
              <a href="<?php echo BASE_URL . '/details'; ?>" class="white">A propos</a><br>
              <a href="<?php echo BASE_URL . '/prestations'; ?>" class="white">Nos prestations</a><br>
              Entretien<br>
              Réparation<br>
              Révision<br>
              Vidange<br>
              Ventes de véhicules<br>
            </p>
          </div>
          <div class="col-sm-6">
            <p>
              <a href="<?php echo BASE_URL . '/vehicules/1'; ?>" class="white">Nos véhicules</a><br>
              <a href="<?php echo BASE_URL . '/contact'; ?>" class="white">Contact</a><br><br>
              <a href="<?php echo BASE_URL . '/avis/1'; ?>" class="white">Avis clients</a><br><br>
              <a href="<?php echo BASE_URL . '/legal-mentions'; ?>" class="white"><b>Mentions légales</b></a><br>
              <a href="<?php echo BASE_URL . '/cgu'; ?>" class="white"><b>CGU</b></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>


</body>

</html>