<?php

require_once 'header.php';

try {
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once 'src/model/UserLogin.php';
    require_once 'config/db.php';
    $login = new UserLogin($pdo);
    $id = $_GET['id'];
    $personne = $login->role($id);
    $bonjour = "Bonjour " . $personne->getInfos();
  } else {
    $bonjour = '';
  }
} catch (PDOException $exception) {
  error($exception->getMessage());
  die($exception->getMessage());
}

?>
<nav class="navbar navbar-expand-lg menu-container">
  <div>
    <div class="row align-items-start">
      <div class="col-sm">
        <img src="../public/assets/img/gvplogo.jpg" alt="Logo Garge V. Parrot" width="150px">
      </div>
      <div class="col-sm">
        <h6><?php echo $bonjour; ?></h6>
      </div>
    </div>
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="menu-block collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=accueil" id="Accueil">Accueil</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=apropos" id="A propos">A propos</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=prestations" id="Nos prestations">Nos prestations</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=vehicules" id="Nos véhicules">Nos véhicules</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=avis" id="Avis">Avis</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="?page=contact" id="Contact">Contact</a></h6>
      </li>
      <li class="nav-item menu">
        <a href="../login.php"><img src="../public/assets/img/admin-users.svg" width="40px"></a>
      </li>
    </ul>
  </div>
</nav>