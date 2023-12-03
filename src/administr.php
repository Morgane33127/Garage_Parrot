<?php

require_once './config/db.php';

?>

<div class="wrapper" style="margin-top: 150px;">
  <div class="one">
    <form method="POST" action="#">
      <div class="row align-items-start">
        <div class="col-4">
          <h3>Nos horaires</h3>
        </div>
        <div class="col-4">
          <button type="submit" class="button" name="majheures"> <i class="bi-pen-fill"></i> Mettre à jour</button>
        </div>
      </div>
      <div class="row align-items-start">
        <div class="col" style="width:500px;" id="form-h">

          <?php
          require 'model/HeurreManager.php';
          $connection = new HeureManager($pdo);
          $heures = $connection->affichageHoraires();
          try {
            $k = 1;
            foreach ($heures as $heure) {
          ?>
              <div class="row align-items-start">
                <div class="col">
                  <input type="text" class="form-control" name="jour<?php echo $k; ?>" id="jour<?php echo $k; ?>" value="<?php echo $heure->getHeureLbl(); ?>">
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="hrdebut<?php echo $k; ?>" id="hrdebut<?php echo $k; ?>" value="<?php echo $heure->getHeureDebut(); ?>">
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="hrfin<?php echo $k; ?>" id="hrfin<?php echo $k; ?>" value="<?php echo $heure->getHeureFin(); ?>">
                </div>
              </div>
          <?php
              $k++;
            }
          } catch (error $e) {
            error($e->getMessage());
          }
          ?>
        </div>

        <div class=" col text-center">
          <div>
            <button type="submit" class="button">Ajouter un utilisateur</button>
          </div>
          <div>
            <button type="submit" class="button">Véhicules à la vente</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="two">
    <div class="row align-items-start p-3">
      <div class="col-4">
        <h3>Nos prestations</h3>
      </div>
      <div class="col-8">
        <button type="submit" class="button">Ajouter</button>
      </div>
    </div>

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
        <div class="container" style="background-color: #F2F2F2; height:auto;">
          <div class="row p-3">
            <div class="col-6 text-start">
              <h5><i class="<?php echo $icons[$i]; ?>"> </i><?php echo $nom; ?></h5>
            </div>
            <div class="col-6 text-end">
              <i class="bi-pen-fill" style="color:red;"></i> <i class="bi-trash-fill" style="color:red;"></i>
            </div>
          </div>
          <div>
            <p><?php echo $largeDescription; ?></p>
          </div>
        </div>

    <?php
        $i++;
      }
    } catch (error $e) {
      error($e->getMessage());
    }
    ?>
  </div>

  <div class="three">
    <div>
      <h3 class="p-3">Avis à vérifier</h3>
      <button type="submit" class="button">Ajouter</button>
    </div>
    <?php
    require 'src/model/AvisManager.php';
    $connection = new AvisManager($pdo);
    $avis = $connection->avisAValider();

    foreach ($avis as $row) {
      $titre = $row->getTitre();
      $comment = $row->getCommentaire();
      $dt = $row->getDate();
      $visiteur = $row->getInfosVisiteur();
      $note = $row->getNote();
      $star = str_repeat('&#x2605;', $note);
    ?>
      <div class="col-sm-4">
        <div class="card-avis">
          <div class="flex">
            <b><?php echo $titre; ?></b>
            <p><small><?php echo $dt; ?></small></p>
            <div>
              <i class="bi-check-circle-fill" style="color:green;"></i> <i class="bi-x-circle-fill" style="color:red;"></i>
            </div>
          </div>
          <p style="color: #EDDB35;"><?php echo $star; ?></p>
          <p><?php echo $comment; ?></p>
          <p><?php echo $visiteur; ?></p>
        </div>
      </div>
    <?php
    }
    ?>

  </div>
</div>

<script>
  let div = document.getElementById('form-h');
  let input = div.getElementsByTagName('input');
  for (let i = 0; i < input.length; i++) {
    input[i].addEventListener("change", () => {
      console.log(input[i].value);

    })
  };
</script>