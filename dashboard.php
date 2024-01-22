<?php
define('app', 1);
session_start();
include_once "./app/controller/DashboardController.php";

$controller = new DashboardController();

$method = $_SERVER['REQUEST_METHOD'];

// check are user already logged in
$controller->isLoggedIn();

// handle login page
if ($method == 'GET') {
  $controller->index();
}