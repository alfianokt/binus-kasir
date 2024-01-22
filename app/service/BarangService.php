<?php
if (!defined('app')) exit;

include_once "./app/database.php";
include_once "./app/model/Barang.php";

class BarangService
{
  private $pdo;

  public function __construct()
  {
    $db = new Database();

    $this->pdo = $db->pdo();
  }

  public function all(){
    $data = [];
    $query = "SELECT * from barang ORDER BY id ASC";

    $statement = $this->pdo->prepare($query);
    $statement->execute();

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
      $data[] = new Barang($row['id'], $row['nama'], $row['keterangan'], $row['satuan'], $row['stok'], $row['idsuplier']);
    }

    return $data;
  }

  public function create(Barang $barang) {
    $query = "INSERT INTO barang (id, nama, keterangan, satuan, stok, idsuplier) VALUES (DEFAULT, :nama, :keterangan, :satuan, :stok, 1)";

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(":nama", $barang->getNama(), PDO::PARAM_STR);
    $statement->bindValue(":keterangan", $barang->getKeterangan(), PDO::PARAM_STR);
    $statement->bindValue(":satuan", $barang->getSatuan(), PDO::PARAM_INT);
    $statement->bindValue(":stok", $barang->getStok(), PDO::PARAM_INT);
    return $statement->execute();
  }

  public function edit(Barang $barang) {
    $query = "UPDATE barang SET nama = :nama, keterangan = :keterangan , satuan = :satuan, stok = :stok WHERE id = :id";

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(":id", $barang->getId(), PDO::PARAM_INT);
    $statement->bindValue(":nama", $barang->getNama(), PDO::PARAM_STR);
    $statement->bindValue(":keterangan", $barang->getKeterangan(), PDO::PARAM_STR);
    $statement->bindValue(":satuan", $barang->getSatuan(), PDO::PARAM_INT);
    $statement->bindValue(":stok", $barang->getStok(), PDO::PARAM_INT);

    return $statement->execute();
  }

  public function delete(Barang $barang) {
    $query = "DELETE FROM barang WHERE id = :id";

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(":id", $barang->getId(), PDO::PARAM_INT);

    return $statement->execute();
  }
}
