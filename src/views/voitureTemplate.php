<div class="container-sm margin-top center">
  <h3>Nos véhicules d'occasions</h3>
  <div class="container">
    <div class="row align-items-start">
      <div class="col-sm-5" id="price">
        <div class="input-group-sm">
          <label for="prixmin"><b>Prix min : </b></label>
          <input id="prixmin" class="form-range" name="prixmin" type="range" min="1" max="25000" step="500" value="500">
          <label for="prixmax"><b>Prix max: </b></label>
          <input id="prixmax" class="form-range" name="prixmax" type="range" min="25000" max="50000" step="500">
        </div>
      </div>
      <div class="col-sm-5" id="kilometer">
        <div class="input-group-sm">
          <label for="kmmin"><b>Km min: </b></label>
          <input id="kmmin" class="form-range" name="kmmin" type="range" min="1" max="100000" step="1000" value="1000">
          <label for="kmmax"><b>Km max: </b></label>
          <input id="kmmax" class="form-range" name="kmmax" type="range" min="100000" max="200000" step="1000">
        </div>
      </div>
      <div class="col-sm-2">
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
