<?php

require './config/db.php';
$annees = $pdo->query("SELECT DISTINCT annee FROM voitures");
$result = $pdo->query("SELECT COUNT(*) AS count FROM voitures")->fetch(PDO::FETCH_OBJ);

include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/VoitureController.php';

$page=1;

?>

<div class="container margin-top">
  <h3>Nos véhicules d'occasions</h3>

  <div class="container">
    <div class="row align-items-start">
      <div class="col price">
        <label for="prix"><b>Prix max : </b></label>
        <input id="prix" class="form-range" name="prix" type="range" min="0" max="50000" step="500">
      </div>
      <div class="col kilometer">
        <label for="km"><b>Km max: </b></label>
        <input id="km" class="form-range" name="km" type="range" min="0" max="500000" step="1000">
      </div>
      <div class=" col">
        <label for="year"><b>Année min : </b></label>
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

  <div style="padding:2%"><?php echo $result->count . " resultats :"; ?></div>

  <div id="request">
    <?php
        $voitureController = new VoitureController();
        $voitureController->affichageCard();
    ?>
  </div>


<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="index.php?page=vehicules&p=<?php echo $page - 1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="index.php?page=vehicules&p=1">1</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=vehicules&p=2">2</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=vehicules&p=3">3</a></li>
    <li class="page-item">
      <a class="page-link" href="index.php?page=vehicules&p=<?php echo $page + 1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</div>

<?php

require_once 'views/footer.php';
