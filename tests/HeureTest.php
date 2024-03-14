<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class HeureTest extends TestCase
{
    public function testAffichage(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new HeureManager($pdo);
        $this->assertIsArray($manager->affichageHoraires());
    }

    public function testChangeHoraires(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $array = array(1, 'LUN', '08:00', '18:00');

        $manager = new HeureManager($pdo);
        $this->assertNull($manager->changeHoraires($array));
    }


}