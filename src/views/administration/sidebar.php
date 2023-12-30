<?php

//Sidebar admin
if ($_SESSION['role'] === 'ADM') {
?>
  <div class="flex-shrink-0 p-3 sidebar-style">
    <a href="index.php" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <img src="public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot" width="50" height="24">
      <span class="fs-5 fw-semibold">Tableau de bord</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Voitures
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=voitures" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Liste</a></li>
            <li><a href="index.php?page=administr&div=addvoitures" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#presta-collapse" aria-expanded="false">
          Prestations
        </button>
        <div class="collapse" id="presta-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=prestations" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Liste</a></li>
            <li><a href="index.php?page=administr&div=addprestations" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#notices-collapse" aria-expanded="false">
          Avis
        </button>
        <div class="collapse" id="notices-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=avis" class="link-body-emphasis d-inline-flex text-decoration-none rounded">A vérifier</a></li>
            <li><a href="index.php?page=administr&div=addavis" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#hours-collapse" aria-expanded="false">
          Horaires
        </button>
        <div class="collapse" id="hours-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=horaires" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Nos horaires</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
          Utilisateurs
        </button>
        <div class="collapse" id="users-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=adduser" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Nouveau...</a></li>
            <li><a href="index.php?page=administr&div=users" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Liste</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <form method="POST" action="index.php?page=demande">
        <button class="button" type="submit" name="disconnect">Se deconnecter</button>
      </form>
    </ul>
  </div>
<?php
} else if ($_SESSION['role'] === 'USR') {
  //Sidebar simple user
?>
  <div class="flex-shrink-0 p-3 sidebar-style">
    <a href="index.php" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <img src="public/assets/img/gvplogo.svg" alt="Logo Garge V. Parrot" width="50" height="24">
      <span class="fs-5 fw-semibold">Tableau de bord</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Voitures
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=voitures" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Liste</a></li>
            <li><a href="index.php?page=administr&div=addvoitures" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#notices-collapse" aria-expanded="false">
          Avis
        </button>
        <div class="collapse" id="notices-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="index.php?page=administr&div=avis" class="link-body-emphasis d-inline-flex text-decoration-none rounded">A vérifier</a></li>
            <li><a href="index.php?page=administr&div=addavis" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <form method="POST" action="index.php?page=demande">
        <button class="button" type="submit" name="disconnect">Se deconnecter</button>
      </form>
    </ul>
  </div>

<?php
}
