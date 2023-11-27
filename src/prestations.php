<div class="container-sm margin-top">
  <h3>Nos prestations</h3>

  <?php
  require './config/db.php';
  $presta = $pdo->query("SELECT * FROM prestations");

  foreach ($presta as $row) {
    $id = $row['id_p'];
    $nom = $row['nom_p'];
    $largeDescription = $row['large_description_p'];
    $largeDescription = str_replace("*", "'", $largeDescription);
  ?>

    <div class="container">
      <h5><i class="bi-nut-fill"> </i><?php echo $nom; ?></h5>
      <p><?php echo $largeDescription; ?></p>
    </div>
  <?php
  }
  ?>

</div>

<?php

require_once 'footer.php';
