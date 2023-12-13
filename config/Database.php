<?php
class Database
{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "garageParrot";
  public $conn;

  public function getConnection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->conn;
    } catch (PDOException $exception) {
      require 'config/functions.php';
      echo "Erreur de connexion : " . $exception->getMessage();
      error($exception->getMessage());
    }
  }
}
