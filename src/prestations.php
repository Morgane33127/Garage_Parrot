<?php

require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
ob_start(); 
$prestationController = new PrestationController();
$prestationController->affichageList();
$content = ob_get_clean();
require "views/prestationsTemplate.php";
