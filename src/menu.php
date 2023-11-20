<?php

require_once 'header.php';

?>
<nav class="navbar navbar-expand-lg menu-container">
  <div class="logo">
    <img src="../public/assets/img/gvplogo.jpg" alt="Logo Garge V. Parrot" style="width:150px;">
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="menu-block collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item menu">
        <h6><a style=" color:#D92332;" href="accueil.php" id="Accueil">Accueil</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a href="apropos.php" id="A propos">A propos</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a href="prestations.php" id="Nos prestations">Nos prestations</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a href="vehicules.php" id="Nos véhicules">Nos véhicules</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a href="notice.php" id="Avis">Avis</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a href="contact.php" id="Contact">Contact</a></h6>
      </li>
      <li class="nav-item menu">
        <a href="../login.php"><img src="../public/assets/img/admin-users.svg" style="width:40px;"></a>
      </li>
    </ul>
  </div>
</nav>