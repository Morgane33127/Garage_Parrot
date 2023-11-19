<?php
$host = 'localhost';
$dbname = 'garageParrot';
$user = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connexion reussis";
} catch (PDOException $exception) {
  die($exception->getMessage());
}
