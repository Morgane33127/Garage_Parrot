<?php



if (!empty($_GET['p'])) {
  $page = $_GET['p'];
} else {
  $page = 1;
}

$filter = '';

/*
foreach ($_GET as $cle => $valeur) {
  $filter = $cle;
  echo $filter;
  include './config/autoload.php';
  include './config/Database.php';
  include './src/controllers/VoitureController.php';
  $voitureController = new VoitureController();
  $voitureController->affichageCardFilter($filter, $page);
}
*/


try {
  if (empty($_GET['prix']) && empty($_GET['km']) && empty($_GET['year'])) {
    $voitureController = new VoitureController();
    $voitureController->affichageCard($filter, $page);
  } else {
    $voitureController = new VoitureController();
    $voitureController->affichageCard();
  }
} catch (error $e) {
  echo $e->getMessage();
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