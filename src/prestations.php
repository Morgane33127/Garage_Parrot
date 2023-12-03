<?php

require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';

?>

<div class="container-sm margin-top">
  <h3>Nos prestations</h3>

  <?php
  // Création du contrôleur de prestations
  $prestationController = new PrestationController();
  $prestationController->affichageList();
  ?>

</div>

<?php

require_once 'footer.php';
