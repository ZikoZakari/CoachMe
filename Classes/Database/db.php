<?php

namespace Classes\Database;

use PDO;
use PDOException;
use Classes\Utils\Helper;

class Db {

  private string $username;
  private string $password;
  private string $hostname;
  private string $databaseName;
  public $DEBUG = true;


    public function __construct() {
      $env = Helper::parseEnvFile(".env");

      $this->username = $env['DB_USERNAME'];
      $this->password = $env['DB_PASSWORD'];
      $this->hostname = $env['DB_HOST'];
      $this->databaseName = $env['DB_NAME'];
    }


    public function getConnection()
    {
        $connectionString = "mysql:host=$this->hostname;dbname=$this->databaseName";
        try {
           $conn = new PDO($connectionString,$this->username,$this->password);
            
            if($this->DEBUG){
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            return $conn;

          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
}