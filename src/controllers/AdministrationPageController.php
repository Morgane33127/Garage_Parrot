<?php

class AdministrationPageController
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->getConnection();
    }

    public function administrationOnglet($div)
    {
        connectOnly();

        $onglet = $div[0];
        if (!empty($onglet)) {
            switch ($onglet) {
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
                    include 'src/views/administration/ajouterVoitureForm.php';
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
                    include 'src/views/administration/ajouterPrestationForm.php';
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
                    include 'src/views/administration/ajouterAvisForm.php';
                    $content = ob_get_clean();
                    break;
                case 'horaires':
                    ob_start();
                    $horaireController = new HoraireController();
                    $contentHoraires = $horaireController->affichageHeuresAdmin();
                    $titre = 'Horaires';
                    include 'src/views/administration/horairesForm.php';
                    $content = ob_get_clean();
                    break;
                case 'adduser':
                    ob_start();
                    $titre = 'Ajouter un utilisateur';
                    include 'src/views/administration/ajouterUtilisateurForm.php';
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
        require "src/views/administration/administrationTemplate.php";
    }
    
}
