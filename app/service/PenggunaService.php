<?php
if (!defined('app')) exit;

include_once "./app/database.php";
include_once "./app/model/Pengguna.php";

class PenggunaService
{
  private $pdo;

  public function __construct()
  {
    $db = new Database();

    $this->pdo = $db->pdo();
  }

  public function login($username, $password) {
    $query = "SELECT * FROM pengguna WHERE username = :username AND password = :password";

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->bindValue(":password", hash('sha256', $password), PDO::PARAM_STR);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row == null) {
      return new Pengguna(-1, null, null, null, null, null);
    }

    return new Pengguna($row['id'], $row['username'],  $row['nama'], $row['phone'], $row['alamat'], $row['idakses']);
  }
}
