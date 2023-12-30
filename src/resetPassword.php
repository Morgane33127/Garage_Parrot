<?php
/* EN : Creating the Reset Password Request Controller
FR : Création du contrôleur de reinitilisation de nouveau mot de passe
*/

include_once './config/autoload.php';
require_once './config/functions.php';
include_once './config/Database.php';

$loginController = new LoginController();
$loginController->newPswd();
