<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class PrestationTest extends TestCase
{
    public function testAffichage(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new PrestationManager($pdo);
        $this->assertIsArray($manager->affichageInfos());
    }

    public function testDeletePrestation(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id=1;

        $manager = new PrestationManager($pdo);
        $this->assertNull($manager->supprimerPrestation($id));
    }

    public function testAddPrestation(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $array = array('Nom P', 'Petite description', 'Grande description');

        $manager = new PrestationManager($pdo);
        $this->assertNull($manager->ajouterPrestation($array));
    }

    public function testUpdatePrestation(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id = 1;
        $petiteDescription = 'Petite description';
        $largeDescription = 'Grande description';

        $manager = new PrestationManager($pdo);
        $this->assertNull($manager->modifierPrestation($id, $petiteDescription, $largeDescription));
    }


}