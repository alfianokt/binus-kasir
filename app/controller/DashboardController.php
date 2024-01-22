<?php
if (!defined('app')) exit;

include_once "./app/service/DashboardService.php";

class DashboardController {
  private $ds;

  public function __construct()
  {
    $this->ds = new DashboardService();
  }
  public function index() {
    $overview = $this->ds->overview();
    $laba_rugi = $overview['harga_penjualan'] - $overview['harga_pembelian'];

    include "./app/views/dashboard.php";
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