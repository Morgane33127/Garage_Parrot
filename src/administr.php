<?php

require_once './config/db.php';

?>

<style>
  .wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px 10px;
    grid-auto-rows: minmax(100px, auto);
    margin: 50px;
  }

  .one {
    grid-column: 1 / 3;
    grid-row: 1;

  }

  .two {
    grid-column: 1 / 3;
    grid-row: 2;

  }

  .three {
    grid-column: 3/4;
    grid-row: 1/3;

  }
</style>

<div class="wrapper">
  <div class="one">
    <h3 class="p-3">Nos horaires <i class="bi-pen-fill"></i></h3>
    <div class="row align-items-start">
      <div class="col" style="width:500px;">

        <?php
        $heures = $pdo->query("SELECT * FROM heures LEFT JOIN lbl ON jour=code_lbl");
        foreach ($heures as $heure) {
        ?>
          <div class="row align-items-start">
            <div class="col">
              <input type="text" class="form-control" value="<?php echo $heure['lbl']; ?>">
            </div>
            <div class="col">
              <input type="text" class="form-control" value="<?php echo $heure['hr_debut']; ?>">
            </div>
            <div class="col">
              <input type="text" class="form-control" value="<?php echo $heure['hr_fin']; ?>">
            </div>
          </div>
        <?php
        }
        ?>

      </div>

      <div class=" col text-center">
        <div>
          <button type="submit">Ajouter un utilisateur</button>
        </div>
        <div>
          <button type="submit">Véhicules à la vente</button>
        </div>
      </div>
    </div>
  </div>
  <div class="two">
    <div class="row align-items-start p-3">
      <div class="col-4">
        <h3>Nos prestations</h3>
      </div>
      <div class="col-8">
        <button type="submit">Ajouter</button>
      </div>
    </div>

    <?php
    $presta = $pdo->query("SELECT * FROM prestations");
    $i = 0;
    foreach ($presta as $row) {
      $nom = $row['nom_p'];
      $largeDescription = $row['large_description_p'];
      $largeDescription = str_replace("*", "'", $largeDescription);
      $icons = array('bi-tools', 'bi-bag-plus-fill', 'bi-stopwatch-fill', 'bi-nut-fill', 'bi-car-front-fill');

    ?>
      <div style="background-color: #F2F2F2; height:auto;">
        <div class="row p-3">
          <div class="col-6 text-start">
            <h6><?php echo $nom; ?></h6>
          </div>
          <div class="col-6 text-end">
            <i class="bi-pen-fill" style="color:red;"></i> <i class="bi-trash-fill" style="color:red;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-2 text-center">
            <h1><i class="<?php echo $icons[$i]; ?>"></i></h1>
          </div>
          <div class="col-10">
            <p><?php echo $largeDescription; ?></p>
          </div>
        </div>
      </div>
      <br>
    <?php
      $i++;
    }
    ?>

  </div>
  <div class="three">
    <div>
      <h3 class="p-3">Avis à vérifier</h3>
      <button type="submit">Ajouter</button>
    </div>
    <?php
    $avis = $pdo->query("SELECT * FROM avis WHERE statut='En attente' ORDER BY dt_a ASC");
    foreach ($avis as $row) {
      $titre = $row['titre_a'];
      $comment = $row['commentaire_a'];
      $dt = $row['dt_a'];
      $nom = $row['visiteur_nom'];
      $prenom = $row['visiteur_prenom'];
      $note = $row['note_a'];
      $star = str_repeat('&#x2605;', $note);
    ?>
      <div style="text-align: start; padding : 1%;background-color:#F2F2F2; height:200px; 
    margin:30px;">
        <div class="row">
          <div class="col-4 text-start">
            <b><?php echo $titre; ?></b>
          </div>
          <div class="col-8 text-end">
            <small><?php echo $dt; ?></small><i class="bi-check-circle-fill" style="color:green;"></i> <i class="bi-x-circle-fill" style="color:red;"></i>
          </div>
        </div>
        <p style="color: #EDDB35;"><?php echo $star; ?></p>
        <p><?php echo $comment; ?></p>
        <p><?php echo $prenom . " " . $nom; ?></p>
      </div>
    <?php
    }

    ?>

  </div>
</div>