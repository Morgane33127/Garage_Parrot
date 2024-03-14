<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class AvisTest extends TestCase
{
    public function testLogin(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $limit = 6;
        $offset = 1;

        $manager = new AvisManager($pdo);
        $this->assertIsArray($manager->affichageAvis($limit, $offset));
    }

    public function testGetTotal(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new AvisManager($pdo);
        $this->assertIsString($manager->getTotalAvisCount());
    }

    public function testAvisAValider(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new AvisManager($pdo);
        $this->assertIsArray($manager->avisAValider());
    }

    public function testNewAvis(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $object = array('Titre', 'Commentaire', 'Nom', 'Prenom', 5);

        $manager = new AvisManager($pdo);
        $this->assertNull($manager->newAvis($object));
    }

    public function testValidation(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id = 1;
        $_SESSION['id'] = 1;

        $manager = new AvisManager($pdo);
        $this->assertNull($manager->validAvis($id));
        $this->assertNull($manager->invalidAvis($id));
    }


}