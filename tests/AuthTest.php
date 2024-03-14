<?php 
declare(strict_types=1);
include_once './config/Database.php';
include_once './config/autoload.php';
include_once './config/functions.php';
use PHPUnit\Framework\TestCase;


final class AuthTest extends TestCase
{
    public function testLogin(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $password = 'Jaimelesvoituresdu31100';
        $mail = 'v.parrot@example.com';
        $_SERVER['REMOTE_ADDR'] = 1;
        $auth = new Auth($pdo);
        $this->assertIsObject($auth->login($password, $mail));
    }

    public function testMail(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $mail = 'v.parrot@example.com';
        $auth = new Auth($pdo);
        $this->assertIsObject($auth->verifMail($mail));
    }

    public function testEvent(): void
    {

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        $id_u = 'v.parrot@example.com';
        $info = 'Connexion';
        $_SERVER['REMOTE_ADDR'] = 1;
        $auth = new Auth($pdo);
        $this->assertEmpty($auth->eventTable($id_u,$info));
    }

}