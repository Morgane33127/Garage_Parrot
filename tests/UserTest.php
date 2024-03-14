<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class UserTest extends TestCase
{

    public function testAffichage(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $manager = new UserManager($pdo);
        $this->assertIsArray($manager->affichageInfos());
    }

    public function testAddUser(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $array = array('480d0370-7550-4952-b70c-369ba53aa136', 'Prenom', 'Nom', 'ADM', 'login@mail.com', 'Topsecret');

        $manager = new UserManager($pdo);
        $this->assertNull($manager->newUser($array));
    }

    public function testDeleteUser(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id='UUID';

        $manager = new UserManager($pdo);
        $this->assertNull($manager->suppUser($id));
    }


}