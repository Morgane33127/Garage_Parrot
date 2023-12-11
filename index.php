<?php
require_once 'src/views/header.php';
require_once 'src/views/menu.php';

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
    case 'accueil':
      require('src/accueil.php');
      break;
    case 'vinfo':
      case 'vinfoadmin':
      require('src/voitureInfo.php');
      break;
    case 'administr':
      require('src/administr.php');
      break;
    case 'demande':
      require('src/demande.php');
      break;
      case 'affichageVoiture':
        require('src/affichageVoiture.php');
        break;
  }
} else {
  require('src/accueil.php');
}
