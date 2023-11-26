<?php

require_once './config/db.php';

?>

<div class="container">

  <h3>Avis clients</h3>

  <div class="action-sup">
    <button type="submit">Laisser un avis</button>
  </div>

  <div id="avis">
    <div class="row align-items-start">
      <?php
      $avis = $pdo->query("SELECT * FROM avis ORDER BY dt_a DESC");
      foreach ($avis as $row) {
        $titre = $row['titre_a'];
        $comment = $row['commentaire_a'];
        $dt = $row['dt_a'];
        $nom = $row['visiteur_nom'];
        $prenom = $row['visiteur_prenom'];
        $note = $row['note_a'];
        $star = str_repeat('&#x2605;', $note);
      ?>
        <div class="col-sm-4">
          <div class="card-avis">
            <div class="flex">
              <b><?php echo $titre; ?></b>
              <p><small><?php echo $dt; ?></small></p>
            </div>
            <p style="color: #EDDB35;"><?php echo $star; ?></p>
            <p><?php echo $comment; ?></p>
            <p><?php echo $prenom . " " . $nom; ?></p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>


  </div>

</div>

<?php

require_once 'footer.php';
