
<?php
require './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';
include_once './src/controllers/PrestationController.php';
include_once './src/controllers/AvisController.php';
include_once './src/controllers/VoitureController.php';
include_once './src/controllers/HoraireController.php';
include_once './src/controllers/UserController.php';

try {
    if ($_SESSION['role'] === 'ADM') {
        if (!empty($_GET['div'])) {
            switch ($_GET['div']) {
                case 'voitures':
                    ob_start();
                    $voitureController = new VoitureController();
                    $voitureController->affichageAll();
                    $titre = 'Voitures à la vente';
                    $content = ob_get_clean();
                    break;
                case 'addvoitures':
                    ob_start();
                    $titre = 'Ajouter une voiture';
                    include 'views/administration/ajouterVoitureForm.php';
                    $content = ob_get_clean();
                    break;
                case 'prestations':
                    ob_start();
                    $prestationController = new PrestationController();
                    $prestationController->affichageListAdmin();
                    $titre = 'Prestations';
                    $content = ob_get_clean();
                    break;
                case 'addprestations':
                    ob_start();
                    $titre = 'Ajouter une prestation';
                    include 'views/administration/ajouterPrestationForm.php';
                    $content = ob_get_clean();
                    break;
                case 'avis':
                    ob_start();
                    $avisController = new AvisController();
                    $avisController->affichageAdmin();
                    $titre = 'Avis';
                    $content = ob_get_clean();
                    break;
                case 'addavis':
                    ob_start();
                    $titre = 'Ajouter un avis';
                    include 'views/administration/ajouterAvisForm.php';
                    $content = ob_get_clean();
                    break;
                case 'horaires':
                    ob_start();
                    $horaireController = new HoraireController();
                    $contentHoraires = $horaireController->affichageHeuresAdmin();
                    $titre = 'Horaires';
                    include 'views/administration/horairesForm.php';
                    $content = ob_get_clean();
                    break;
                case 'adduser':
                    ob_start();
                    $titre = 'Ajouter un utilisateur';
                    include 'views/administration/ajouterUtilisateurForm.php';
                    $content = ob_get_clean();
                    break;
                case 'users':
                    ob_start();
                    $userController = new UserController();
                    $content1 = $userController->affichageListUser();
                    $titre = 'Utilisateurs';
                    $content = ob_get_clean();
                    break;
            }
        } else {
            ob_start();
            $voitureController = new VoitureController();
            $voitureController->affichageAll();
            $titre = 'Voitures à la vente';
            $content = ob_get_clean();
        }

        require "views/administration/administrationTemplate.php";
    } else if ($_SESSION['role'] === 'USR') {

        if (!empty($_GET['div'])) {
            switch ($_GET['div']) {
                case 'voitures':
                    ob_start();
                    $voitureController = new VoitureController();
                    $voitureController->affichageAll();
                    $titre = 'Voitures à la vente';
                    $content = ob_get_clean();
                    break;
                case 'addvoitures':
                    ob_start();
                    $titre = 'Ajouter une voiture';
                    include 'views/administration/ajouterVoitureForm.php';
                    $content = ob_get_clean();
                    break;
                case 'avis':
                    ob_start();
                    $avisController = new AvisController();
                    $avisController->affichageAdmin();
                    $titre = 'Avis';
                    $content = ob_get_clean();
                    break;
                case 'addavis':
                    ob_start();
                    $titre = 'Ajouter un avis';
                    include 'views/administration/ajouterAvisForm.php';
                    $content = ob_get_clean();
                    break;
            }
        } else {
            ob_start();
            $voitureController = new VoitureController();
            $voitureController->affichageAll();
            $titre = 'Voitures à la vente';
            $content = ob_get_clean();
        }

        require "views/administration/administrationTemplateSimpleUser.php";
    } else {
        throw new Exception('Permission inconnue.');
    }
} catch (Exception $exception) {
    $msg = $exception->getMessage();
    error($msg);
    sessionAlert('danger', $msg);
}
