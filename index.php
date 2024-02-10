<?php

/* EN : Entrance door to the site. We integrate the header. We display the menu for non-blacklisted pages. We start the session.
The index acts as a router.

FR : Porte d'entrée du site. On intègre le header. On affiche le menu pour les pages non "black-listées". On démarre la session. 
L'index joue le rôle de routeur.
*/

require_once 'src/views/header.php';

if (
  !isset($_GET['page']) || $_GET['page'] != 'administr' && $_GET['page'] != 'login' && $_GET['page'] != 'forget-pswd' && $_GET['page'] != 'reset-password'
  && $_GET['page'] != 'vinfoadmin'
) {
  require_once 'src/views/menu.php';
}

session_start();

if (isset($_SESSION['alert'])) {
  require_once 'src/views/sessionView.php';
  unset($_SESSION['alert']);
}

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
    case 'login':
      require('src/login.php');
      break;
    case 'forget-pswd':
      require('src/mdpOublie.php');
      break;
    case 'reset-password':
      require('src/resetPassword.php');
      break;
    case 'legalMentions':
      require('src/views/legalMentions.php');
      break;
    case 'cgu':
      require('src/views/cgu.php');
      break;
    case 'request':
      require('src/affichageVoitures.php');
      break;
  }
} else {
  require('src/accueil.php');
}
