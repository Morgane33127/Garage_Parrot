<?php
require_once 'src/views/header.php';
require_once 'src/views/menu.php';
require_once 'config/autoload.php';

/*Traitement des routes avec un contrôleur par défaut (UserController)
$userController = new UserController();

if (isset($_GET['action'])) {
  $action = $_GET['action'];
  echo "<br><br><br><br><br>$action";
  // Déterminez quelle action du contrôleur appeler
  if (method_exists($userController, $action)) {
    $userController->{$action}();
  } else {
    echo "Action non trouvée.";
  }
} else {
  // Action par défaut (par exemple, afficher la page de connexion)
  $userController->login();
}
*/

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
      require('src/views/contact.php');
      break;
    case 'accueil':
      require('src/accueil.php');
      break;
    case 'vinfo':
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
