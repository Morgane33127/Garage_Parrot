<div class="container-sm margin-top">
  <h3>Nos prestations</h3>

  <?php

  try {
    require_once 'src/model/PrestationManager.php';
    require_once 'config/db.php';
    $connection = new PrestationManager($pdo);
    $prestation = $connection->affichageInfos();

    $i = 0;
    foreach ($prestation as $row) {
      $nom = $row->getNom();
      $largeDescription = $row->getLargeDescription();
      $largeDescription = str_replace("*", "'", $largeDescription);
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');
  ?>
      <div class="container">
        <h5><i class="<?php echo $icons[$i]; ?>"> </i><?php echo $nom; ?></h5>
        <p><?php echo $largeDescription; ?></p>
      </div>
  <?php
      $i++;
    }
  } catch (error $e) {
    error($e->getMessage());
  }
  ?>

</div>

<?php

require_once 'footer.php';
