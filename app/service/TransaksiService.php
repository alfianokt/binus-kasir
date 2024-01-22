<?php
if (!defined('app')) exit;

include_once "./app/database.php";
include_once "./app/model/Transaksi.php";
include_once "./app/model/Pengguna.php";
include_once "./app/model/Barang.php";

class TransaksiService
{
  private $pdo;

  public function __construct()
  {
    $db = new Database();

    $this->pdo = $db->pdo();
  }

  public function all()
  {
    $data = [];
    $query = "select t.*, b.nama as barang_nama from transaksi t join barang b on b.id = t.idbarang ORDER BY t.id ASC";

    $statement = $this->pdo->prepare($query);
    $statement->execute();

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
      $transaksi = new Transaksi($row['id'], $row['jenistransaksi'], $row['jumlah'], $row['harga'], $row['tanggal'], $row['idbarang'], $row['idpengguna']);
      $transaksi->setBarang(new Barang(-1, $row['barang_nama'], null, null, null, null));
      $data[] = $transaksi;
    }

    return $data;
  }

  public function create(Transaksi $transaksi)
  {
    try {
      $this->pdo->beginTransaction();

      $query = "SELECT satuan from barang WHERE id = :id";

      $statement = $this->pdo->prepare($query);
      $statement->bindValue(":id", $transaksi->getIdBarang(), PDO::PARAM_INT);
      $statement->execute();

      $barang = $statement->fetch(PDO::FETCH_ASSOC);

      $query = "INSERT INTO transaksi (id, jenistransaksi, jumlah, harga, tanggal, idbarang, idpengguna) VALUES (DEFAULT, :jenistransaksi, :jumlah, :harga, CURRENT_DATE, :idbarang, :idpengguna)";

      $statement = $this->pdo->prepare($query);
      $statement->bindValue(":jenistransaksi", $transaksi->getJenisTransaksi(), PDO::PARAM_INT);
      $statement->bindValue(":jumlah", $transaksi->getJumlah(), PDO::PARAM_INT);
      $statement->bindValue(":harga", $transaksi->getJumlah() * $barang['satuan'], PDO::PARAM_INT);
      $statement->bindValue(":idbarang", $transaksi->getIdBarang(), PDO::PARAM_INT);
      $statement->bindValue(":idpengguna", $transaksi->getIdPengguna(), PDO::PARAM_INT);
      $statement->execute();

      if ($transaksi->getJenisTransaksi() == 0) {
        $query2 = "UPDATE barang SET stok = stok + :jumlah WHERE id = :id";
      } else {
        $query2 = "UPDATE barang SET stok = stok - :jumlah WHERE id = :id";
      }
      $statement2 = $this->pdo->prepare($query2);
      $statement2->bindValue(":id", $transaksi->getIdBarang(), PDO::PARAM_INT);
      $statement2->bindValue(":jumlah", $transaksi->getJumlah(), PDO::PARAM_INT);
      $statement2->execute();

      return $this->pdo->commit();
    } catch (PDOException $e) {
      $this->pdo->rollBack();
      echo "Transaction failed: " . $e->getMessage();

      return 0;
    }
  }
}
