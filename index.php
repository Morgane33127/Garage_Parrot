<?php
require_once 'src/header.php';
require_once 'src/menu.php';

if (!empty($_GET['page'])) {
  switch ($_GET['page']) {
    case 'apropos':
      require('src/apropos.php');
      break;
    case 'prestations':
      require('src/prestations.php');
      break;
    case 'vehicules':
      require('src/voitures.php');
      break;
    case 'avis':
      require('src/avis.php');
      break;
    case 'contact':
      require('src/contact.php');
      break;
  }
} else {
  require('src/accueil.php');
}
