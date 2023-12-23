<?php
include_once './config/autoload.php';
require_once './config/functions.php';
include_once './config/Database.php';
include_once './src/controllers/LoginController.php';

if(!empty($_SESSION['alert'])) {
    ?>
    <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?>"  role="alert">
    <?php echo $_SESSION['alert']['msg']; ?>
    </div>
    <?php
}

// Création du contrôleur de connexion
$loginController = new LoginController();
$loginController->login();
