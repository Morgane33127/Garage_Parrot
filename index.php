<?php
session_start();

require_once 'config/Router.php';
require_once 'config/Database.php';
require_once 'config/const.php';
require_once 'config/functions.php';
require_once 'config/autoload.php';
require_once 'src/views/header.php';

if($_SERVER['REQUEST_URI'] != BASE_URL.'/login' 
&& $_SERVER['REQUEST_URI'] != BASE_URL.'/forget' 
&& $_SERVER['REQUEST_URI'] != BASE_URL.'/reset'
&& !str_contains($_SERVER['REQUEST_URI'], BASE_URL.'/administration')){
require_once 'src/views/menu.php';
}

if (isset($_SESSION['alert'])) {
  require_once 'src/views/sessionView.php';
  unset($_SESSION['alert']);
}

$router = new Router();
$router->addRoute('GET', BASE_URL . '/', 'PageController', 'index');
$router->addRoute('GET', BASE_URL . '/details', 'PageController', 'details');
$router->addRoute('GET', BASE_URL . '/prestations', 'PageController', 'prestations');
$router->addRoute('GET', BASE_URL . '/vehicules/{page}', 'PageController', 'vehicules');
$router->addRoute('GET', BASE_URL . '/avis/{page}', 'PageController', 'avis');
$router->addRoute('GET', BASE_URL . '/contact', 'PageController', 'contact');
$router->addRoute('GET', BASE_URL . '/cgu', 'PageController', 'cgu');
$router->addRoute('GET', BASE_URL . '/legal-mentions', 'PageController', 'legal');
$router->addRoute('GET', BASE_URL . '/login', 'LoginController', 'login');
$router->addRoute('POST', BASE_URL . '/demande', 'PageController', 'demande');
$router->addRoute('GET', BASE_URL . '/forget', 'LoginController', 'forgetPswd');
$router->addRoute('GET', BASE_URL . '/reset', 'LoginController', 'newPswd');
$router->addRoute('GET', BASE_URL . '/v-info/{id}', 'VoitureController', 'voitureInfos');

$router->addRoute('POST', BASE_URL . '/login', 'LoginController', 'login');
$router->addRoute('GET', BASE_URL . '/verification', 'LoginController', 'verification');

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

  $router->addRoute('GET', BASE_URL . '/administration/{div}', 'AdministrationPageController', 'administrationOnglet');
  $router->addRoute('GET', BASE_URL . '/administration/voitures/infos/{id}', 'VoitureController', 'voitureInfosAdmin');
  $router->addRoute('POST', BASE_URL . '/deconnexion', 'LoginController', 'disconnect');
}

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$handler = $router->getHandler($method, $uri);
if($handler == null){
  header('HTTP/1.1 404 not found');
  exit();
}

$controller = new $handler['controller']();
$action = $handler['action'];
$params = $handler['params'];
$controller->$action($params);

