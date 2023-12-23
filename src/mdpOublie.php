<?php
include_once './config/autoload.php';
require_once './config/functions.php';
include_once './config/Database.php';
include_once './src/controllers/LoginController.php';

// Création du contrôleur de demande de nouveau mot de passe
$loginController = new LoginController();
$loginController->forgetPswd();