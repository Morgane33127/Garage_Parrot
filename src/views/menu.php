<nav class="navbar navbar-expand-sm navigation">
  <a href="<?php echo BASE_URL; ?>"><img class="mx-5" src="<?php echo BASE_URL; ?>/public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot, garage, automobile, voitures, réparation, entretien, vidange" width="150px"></a>
  <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse menu-block" id="navbarNav">
    <ul class=" navbar-nav">
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL; ?>" id="Accueil">Accueil</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL . '/details'; ?>" id="A propos">A propos</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL . '/prestations'; ?>" id="Nos prestations">Nos prestations</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL . '/vehicules/1'; ?>" id="Nos véhicules">Nos véhicules</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL . '/avis/1'; ?>" id="Avis">Avis</a></h6>
      </li>
      <li class="nav-item menu">
        <h6><a class="link-menu" href="<?php echo BASE_URL . '/contact'; ?>" id="Contact">Contact</a></h6>
      </li>
      <li class="nav-item menu">
        <a href="<?php echo BASE_URL . '/login'; ?>"><button type="button" class="button">Espace pro</button></a>
      </li>
    </ul>
  </div>
</nav>