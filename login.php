<?php
define('app', 1);
session_start();
include_once "./app/controller/LoginController.php";

$controller = new LoginController();

$method = $_SERVER['REQUEST_METHOD'];

// check are user already logged in
$controller->isLoggedIn();

// handle login page
if ($method == 'GET') {
  $controller->index();
}

// handle login data
if ($method == 'POST') {
  $controller->login();
}
?>