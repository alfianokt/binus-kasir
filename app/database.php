<?php
if (!defined('app')) exit;

class Database {
  private $host = 'localhost';
  private $dbname = 'binus';
  private $schema = 'shop';
  private $user = 'postgres';
  private $password = 'mysecretpassword';

  public function pdo() {
    $host = $this->host;
    $dbname = $this->dbname;
    $schema = $this->schema;
    $user = $this->user;
    $password = $this->password;

    try {
      $pdo = new PDO("pgsql:host=$host;dbname=$dbname;dbname=$dbname;options='--search_path=$schema'", $user, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $pdo;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>