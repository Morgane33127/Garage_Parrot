<?php

include_once 'src/header.php';
include_once 'config/autoload.php';
include_once 'config/Database.php';
include_once 'src/controllers/LoginController.php';

// Création du contrôleur de connexion
$loginController = new LoginController();
$loginController->login();
