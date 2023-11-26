<div class="container-sm">
  <h3>Nos prestations</h3>

  <?php
  require './config/db.php';
  $presta = $pdo->query("SELECT * FROM prestations");

  foreach ($presta as $row) {
    $id = $row['id_p'];
    $nom = $row['nom_p'];
    $largeDescription = $row['large_description_p'];
    $largeDescription = str_replace("*", "'", $largeDescription);
    if ($id % 2 != 0) {
  ?>

      <div class="container">
        <div class="row align-items-start">
          <div class="col-sm-4 p-3">
            <div class="prestation-card">
              <h4><?php echo $nom; ?></h4>
            </div>
          </div>
          <div class="col-sm-8">
            <p><?php echo $largeDescription; ?></p>
          </div>
        </div>
      </div>

    <?php
    } else {

    ?>

      <div class="container">
        <div class="row align-items-start">
          <div class="col-sm-8">
            <p><?php echo $largeDescription; ?></p>
          </div>
          <div class="col-sm-4 p-3">
            <div class="prestation-card">
              <h4><?php echo $nom; ?></h4>
            </div>
          </div>
        </div>
      </div>

  <?php

    }
  }
  ?>

</div>

<?php

require_once 'footer.php';
