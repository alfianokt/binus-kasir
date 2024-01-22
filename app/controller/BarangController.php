<?php
if (!defined('app')) exit;

include_once "./app/service/BarangService.php";

class BarangController {
  private $bs;

  public function __construct()
  {
    $this->bs = new BarangService();
  }

  public function index() {
    $barang_edit = null;
    $barang = $this->bs->all();

    if (isset($_GET['form']) && $_GET['form'] == 'edit') {
      foreach($barang as $b) {
        if ($b->getId() == $_GET['id']) {
          $barang_edit = $b;
        }
      }

      if ($barang_edit == null) {
        header("Location: /barang.php");
      }
    }

    require "./app/views/barang.php";
  }

  public function create() {
    $barang = new Barang(-1, $_POST['nama'], $_POST['nama'], $_POST['satuan'], $_POST['stok'], 1);

    var_dump($barang);

    $this->bs->create($barang);

    header("Location: /barang.php");
  }

  public function edit() {
    $barang = new Barang($_GET['id'], $_POST['nama'], $_POST['nama'], $_POST['satuan'], $_POST['stok'], 1);

    $this->bs->edit($barang);

    header("Location: /barang.php");
  }

  public function delete() {
    $barang = new Barang($_POST['id'], null, null, null, null, null);

    $this->bs->delete($barang);

    header("Location: /barang.php");
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