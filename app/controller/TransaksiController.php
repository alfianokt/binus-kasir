<?php
if (!defined('app')) exit;

include_once "./app/service/TransaksiService.php";
include_once "./app/service/BarangService.php";
include_once "./app/model/Transaksi.php";

class TransaksiController {
  private $ts;
  private $bs;

  public function __construct()
  {
    $this->ts = new TransaksiService();
    $this->bs = new BarangService();
  }

  public function index() {
    $transaksi = $this->ts->all();
    $barang = $this->bs->all();

    require "./app/views/transaksi.php";
  }

  public function create() {
    $transaksi = new Transaksi(-1, $_POST['jenistransaksi'], $_POST['jumlah'], 0, null, $_POST['idbarang'], 1);

    $this->ts->create($transaksi);

    header("Location: /transaksi.php");
  }

  public function isLoggedIn() {
    if (!isset($_SESSION['id'])) {
      $this->toLogin();
    }
  }

  public function toLogin() {
    header("Location: /login.php");
  }
}

?>