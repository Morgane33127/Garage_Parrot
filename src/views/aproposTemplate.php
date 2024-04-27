<div class="container-sm margin-top center">
  <section>
    <h2>A propos du Garage V. Parrot</h2>
    <div class="container">
      <div class="row align-items-start">
        <div class="col-sm-6">
          <p>
            Bienvenue chez Garage V. Parrot, votre partenaire automobile de confiance.
            <br>
            Notre petit garage propose une large gamme de services :
          <ul>
            <option>* Réparation : carosserie & mécanique </option>
            <option>* Entretien</option>
            <option>* Révision</option>
            <option>* Vidange</option>
            <option>* Vente de voitures d'occasions</option>
          </ul>
          Le Garage V. Parrot c'est une équipe dévouée de mécaniciens expérimentés qui se chargera de votre véhicule sans délais et sans frais cachés.
          Chez nous, chaque client est accueilli chaleureusement dans une atmosphère conviviale.
          </p>
        </div>
        <div class="col-sm-6">
          <img src="<?php echo BASE_URL; ?>/public/assets/img/garage.jpg" alt="photo garage-v-parrot, garage, automobile, voitures, réparation, entretien, vidange" width="80%">
        </div>
      </div>
    </div>
  </section>

  <section>
    <h2>Nos valeurs</h2>
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

  <section id="prestations">
    <h2>Nos prestations</h2>
    <div class="container text-center">
      <div class="row align-items-start">
        <?php
        echo $content;
        ?>
      </div>
    </div>
  </section>
</div>

<?php
require_once 'footer.php';
