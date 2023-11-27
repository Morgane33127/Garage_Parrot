<?php

require_once './config/db.php';

if (!empty($_GET['p']) && !isset($_GET['p'])) {
  $page = $_GET['p'];
} else {
  $page = 1;
}

?>

<div class="container margin-top">

  <h3>Avis clients</h3>

  <div class="action-sup">
    <button type="submit" class="button">Laisser un avis</button>
  </div>

  <div id="avis">
    <div class="row align-items-start">
      <?php
      require 'src/model/AvisManager.php';
      $connection = new AvisManager($pdo);
      $avis = $connection->affichageAvis($page);

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

  <div class="action-sup">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="index.php?page=avis&p=<?php echo $page - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?page=avis&p=1">1</a></li>
        <li class="page-item"><a class="page-link" href="index.php?page=avis&p=2">2</a></li>
        <li class="page-item"><a class="page-link" href="index.php?page=avis&p=3">3</a></li>
        <li class="page-item">
          <a class="page-link" href="index.php?page=avis&p=<?php echo $page + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

</div>

<?php

require_once 'footer.php';
