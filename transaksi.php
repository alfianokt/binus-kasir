<?php
define('app', 1);
session_start();
include_once "./app/controller/TransaksiController.php";

$controller = new TransaksiController();

$method = $_SERVER['REQUEST_METHOD'];

// check are user already logged in
$controller->isLoggedIn();

// handle index page
if ($method == 'GET') {
  $controller->index();
}

// handle index page
if ($method == 'POST') {
  if (isset($_GET['form'])) {
    if ($_GET['form'] == 'add') {
      $controller->create();
    }
  }
}