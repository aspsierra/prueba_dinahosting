<?php
require_once 'utils' . DIRECTORY_SEPARATOR . 'autoloader.php';

session_start();

use controllers\AuthController;
use controllers\UserController;
use services\Database\DBHandler;

$env = parse_ini_file('.env');
$db = new DBHandler();
$pdo = $db->getConnection();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$userController = new UserController($pdo);
$authController = new AuthController($env);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $authController->login($_POST['user'], $_POST['password']);
    } elseif ($action == 'logout') {
        $authController->logout();
    } elseif ($action == 'addUser' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $userController->addUser($_POST['username'], $_POST['password'], $_POST['host'], $_POST['privileges']);
    } elseif($action == 'addUser') {
        $userController->showAddUserForm();
    } elseif ($action == 'deleteUser' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $userController->deleteUser($_POST['user'], $_POST['host']);
    } elseif ($action == 'details' && isset($_GET['user']) && isset($_GET['host'])){
        $userController->getUserDetails($_GET['user'], $_GET['host']);
    }
} else {
    if (!$authController->isLoggedIn()) {
        $authController->showLogin();
    } else {
        $userController->listUsers();
    }
}