<?php

if (!empty($_GET['p']) && isset($_GET['p'])) {
  $page = $_GET['p'];
} else {
  $page = 1;
}

try {
  if (empty($_GET['prix']) && empty($_GET['km']) && empty($_GET['year'])) {
    $voitures = $connection->affichageVoitures2($page);
  } else if (!empty($_GET['prix'])) {
    require '../src/model/CarInfos.php';
    require '../config/db.php';
    $connection = new CarInfos($pdo);
    $prix = $_GET['prix'];
    $voitures = $connection->affichageVoituresPrix($prix, $page);
  } else if (!empty($_GET['km'])) {
    $km = $_GET['km'];
    require '../src/model/CarInfos.php';
    require '../config/db.php';
    $connection = new CarInfos($pdo);
    $voitures = $connection->affichageVoituresKm($km, $page);
  } else if (!empty($_GET['year'])) {
    $year = $_GET['year'];
    require '../src/model/CarInfos.php';
    require '../config/db.php';
    $connection = new CarInfos($pdo);
    $voitures = $connection->affichageVoituresAnnee($year, $page);
  }

  foreach ($voitures as $row) {

    $id = $row->getId();
    $titre = $row->getTitre();
    $description = $row->getPetiteDescription();
    $img = '../public/assets/img/' . $row->getImage();
    $prix = number_format($row->getPrix(), 0, ',', ' ');

?>
    <div class="voiture-card">
      <div>
        <h5><?php echo $titre; ?></h5>
        <p><?php echo $description; ?></p>
        <button class="button">
          <p class="titre"><?php echo $prix . "€"; ?></p>
        </button>
        <a class="link" href="index.php?page=vinfo&id=<?php echo $id; ?>">En savoir plus >></a>
      </div>
      <div>
        <img src="<?php echo $img; ?>" alt="Logo Garge V. Parrot" style="height:150px;">
      </div>
    </div>

<?php
  }
} catch (error $e) {
  error($e->getMessage());
}

?>

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