<?php
/* EN : Creating the New Password Request Controller
FR : Création du contrôleur de demande de nouveau mot de passe
*/

include_once './config/autoload.php';
include_once './config/functions.php';
include_once './config/Database.php';

$loginController = new LoginController();
$loginController->forgetPswd();
