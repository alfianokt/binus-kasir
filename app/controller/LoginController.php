<?php
if (!defined('app')) exit;

include_once "./app/service/PenggunaService.php";

class LoginController {
  public function index() {
    include "./app/views/login.php";
  }

  public function login() {
    $ps = new PenggunaService();

    $user = $ps->login($_POST['username'], $_POST['password']);

    if ($user->getId() == -1) {
      header("Location: /login.php?incorect_user=1");
      exit();
    } else {
      $_SESSION['id'] = $user->getId();

      header("Location: /dashboard.php");
    }
  }

  public function isLoggedIn() {
    if (isset($_SESSION['id'])) {
      $this->toDashboard();
    }
  }

  public function toDashboard() {
    header("Location: /dashboard.php");
  }
}

?>