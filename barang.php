<?php
define('app', 1);
session_start();
include_once "./app/controller/BarangController.php";

$controller = new BarangController();

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

    if ($_GET['form'] == 'edit') {
      $controller->edit();
    }

    if ($_GET['form'] == 'delete') {
      $controller->delete();
    }
  }
}