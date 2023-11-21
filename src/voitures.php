<?php

require_once './config/db.php';

?>

<div class="container">
  <h3>Nos véhicules d'occasions</h3>

  <div class="container">
    <div class="row align-items-start">
      <div class="col price">
        <label for="prix"><b>Prix : </b></label>
        <input id="prix" class="form-range" name="prix" type="range" min="0" max="50000" step="500" onchange="changePrix()">
      </div>
      <div class="col kilometer">
        <label for="km"><b>Km : </b></label>
        <input id="km" class="form-range" name="km" type="range" min="0" max="500000" step="1000" onchange="changeKm()">
      </div>
      <div class=" col">
        <label for="year"><b>Année de mise en circulation : </b></label>
        <select id="year" class="form-select" name="year" onchange="changeDate()">
          <?php
          $annees = $pdo->query("SELECT DISTINCT annee FROM voitures");
          foreach ($annees as $annee) {
          ?>
            <option value=" 1"><?php echo $annee['annee']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
  </div>

</div>

<?php

require_once 'footer.php';
