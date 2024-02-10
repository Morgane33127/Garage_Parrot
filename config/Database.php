<?php

require 'env.php';
/**
 * The Database class allows you to create the database and connect to it.
 *
 * @author Morgane G.
 */

class Database
{

  private $host;
  private $username;
  private $password;
  private $database;
  public $conn;
  

  public function __construct()
  {

    $this->host = $_ENV["DB_HOST"];
    $this->username = $_ENV["DB_USERNAME"];
    $this->password = $_ENV["DB_PASSWORD"];
    $this->database = $_ENV["DB_DATABASE"];

  }

  /**
   * Database Creation
   *
   * @return object Connexion
   */
  public function createDatabase()
  {
    
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . "", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->conn;
    } catch (PDOException $exception) {
      echo "Erreur de creation : " . $exception->getMessage();
      error($exception->getMessage());
    }
  }

  /**
   * Database Connexion
   *
   * @return object Connexion to database
   */
  public function getConnection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->conn;
    } catch (PDOException $exception) {
      echo "Erreur de connexion : " . $exception->getMessage();
      error($exception->getMessage());
    }
  }
}
