<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class VoitureTest extends TestCase
{
    public function testNewVoiture(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $array = array('KIA Picanto 2022', 'KIA Picanto 1.0 essence 66 chevaux', 'KIA Picanto 1.0 essence 66 chevaux',
        'KIA', 'Picanto', 11400, 'img', '2022', 13000, 'Dispo', 'Auto', 'Essence', 'Jaune', 5, 5, '5');

        $manager = new VoitureManager($pdo);
        $this->assertNull($manager->newVoiture($array));
    }

    public function testAffichage(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id_v = 2;

        $manager = new VoitureManager($pdo);
        $this->assertIsObject($manager->affichageInfos($id_v));
    }

    public function testGetTotalVoiture(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new VoitureManager($pdo);
        $this->assertIsString($manager->getTotalVoitureCount());
    }

    public function testVoitureAll(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new VoitureManager($pdo);
        $this->assertIsArray($manager->affichageVoituresAll());
    }

    public function testUpdateVoiture(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $array = array(2,'KIA Picanto 2022', 'KIA Picanto 1.0 essence 66 chevaux', 'KIA Picanto 1.0 essence 66 chevaux',
        'KIA', 'Picanto', 11400, 'img', '2022', 13000, 'Dispo', 2,'Auto', 'Essence', 'Jaune', 5, 5, '5');

        $manager = new VoitureManager($pdo);
        $this->assertNull($manager->updateVoiture($array));
    }

    public function testDeleteVoiture(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id_v = 2;

        $manager = new VoitureManager($pdo);
        $this->assertNull($manager->supprimerVoiture($id_v));
    }

}