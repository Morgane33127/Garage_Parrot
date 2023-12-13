<?php

require_once 'header.php';
session_start();
if(isset($_SESSION['loggedin'])){
  $bonjour = "Bonjour " . $_SESSION['infos'];
} else {
  $bonjour = '';
}

?>

<nav class="navbar navbar-expand-md navigation">
  <div class="row">
    <div class="col-sm-6">
      <img src="public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot" width="150px">
    </div>
    <div class="col-sm-6">
      <h6><?php echo $bonjour; ?></h6>
    </div>
  </div>
  <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  menu-block" id="navbarNav">
    <ul class=" navbar-nav">
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
        <a href="login.php"><img src="public/assets/img/admin-users.svg" width="40px"></a>
      </li>
    </ul>
  </div>
</nav>

