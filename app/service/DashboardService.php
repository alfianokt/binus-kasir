<?php
if (!defined('app')) exit;

include_once "./app/database.php";

class DashboardService
{
  private $pdo;

  public function __construct()
  {
    $db = new Database();

    $this->pdo = $db->pdo();
  }

  public function overview() {
    return [
      'item_pembelian' => $this->sumQuery('jumlah', 0)['sum'],
      'harga_pembelian' => $this->sumQuery('harga', 0)['sum'],
      //
      'item_penjualan' => $this->sumQuery('jumlah', 1)['sum'],
      'harga_penjualan' => $this->sumQuery('harga', 1)['sum'],
    ];
  }

  private function sumQuery($field, $type) {
    $query = "select sum($field) as sum from shop.transaksi where jenistransaksi = :type;";

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(":type", $type, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }
}
