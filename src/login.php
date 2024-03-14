<?php

/* EN : Creating the connection controller
FR : Création du contrôleur de connexion
*/

include_once './config/autoload.php';
include_once './config/functions.php';
include_once './config/Database.php';

if (!empty($_SESSION['alert'])) {
    require './views/sessionView.php';
}

$loginController = new LoginController();
$loginController->login();
