<div class="container-sm margin-top center">
  <h3>Nos véhicules d'occasions</h3>
  <div class="container">
    <div class="row align-items-start">
      <div class="col-sm price">
        <label for="prix"><b>Prix max : </b></label>
        <input id="prix" class="form-range" name="prix" type="range" min="0" max="50000" step="500">
      </div>
      <div class="col-sm kilometer">
        <label for="km"><b>Km max: </b></label>
        <input id="km" class="form-range" name="km" type="range" min="0" max="250000" step="1000">
      </div>
      <div class="col-sm">
        <label for="year"><b>Année max : </b></label>
        <select id="year" class="form-select" name="year">
          <option value="">Année</option>
          <?php
          foreach ($annees as $annee) {
          ?>
            <option value="<?php echo $annee['annee']; ?>"><?php echo $annee['annee']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div id="request" class="my-3">
    <?php
    echo $count . " résultat(s) :";
    echo $content;
    ?>
  </div>
</div>

<?php

require_once 'footer.php';
