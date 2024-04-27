<?php

class PageController
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->getConnection();
    }

    public function index()
    {
        $page = 1;
        $limit1 = 6;
        $limit2 = 3;

        ob_start();
        $prestationController = new PrestationController();
        $prestationController->affichage();
        $content1 = ob_get_clean();

        ob_start();
        $avisController = new AvisController();
        $avisController->affichageCarousel($page, $limit1);
        $content2 = ob_get_clean();

        ob_start();
        $voitureController = new VoitureController();
        $voitureController->affichageCard($page, $limit2);
        $content3 = ob_get_clean();

        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        require 'src/views/accueilTemplate.php';
    }

    public function details()
    {
        ob_start();
        $prestationController = new PrestationController();
        $prestationController->affichage();
        $content = ob_get_clean();
        
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/aproposTemplate.php";
    }

    public function prestations()
    {
        ob_start();
        $prestationController = new PrestationController();
        $prestationController->affichageList();
        $content = ob_get_clean();
        
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/prestationsTemplate.php";
    }

    public function vehicules($page)
    {
        $limit = 6;

        $db = new Database();
        $db = $db->getConnection();
        $annees = $db->query("SELECT DISTINCT annee FROM voitures");
        
        ob_start();
        $voitureController = new VoitureController();
        $voitureController->countVoiture();
        $nbResult = ob_get_clean();
        
        if (isset($page[0]) && $page[0] > 0 && $page[0] <= $nbResult) {
            $page = $page[0];
        } else {
            $page = 1;
        }
        
        ob_start();
        $voitureController = new VoitureController();
        $voitureController->affichageCard($page, $limit);
        $content = ob_get_clean();
        
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/voitureTemplate.php";
    }

    
    public function avis($page)
    {
        $limit = 6;

        ob_start();
        $avisController = new AvisController();
        $avisController->countAvis();
        $nbResult = ob_get_clean();

        if (isset($page[0]) && $page[0] > 0 && $page[0] <= $nbResult) {
            $page = $page[0];
        } else {
            $page = 1;
        }
        
        ob_start();
        $avisController = new AvisController();
        $avisController->affichage($page, $limit);
        $content = ob_get_clean();
        
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/avisTemplate.php";
    }

    
    public function contact()
    {
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/contactTemplate.php";
    }

    public function cgu()
    {
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/cgu.php";
    }

    public function legal()
    {
        ob_start();
        $horaireController = new HoraireController();
        $horaireController->affichageHeures();
        $horaires = ob_get_clean();
        
        require "src/views/legalMentions.php";
    }

    public function demande()
    {
        require "src/demande.php";
    }

}
