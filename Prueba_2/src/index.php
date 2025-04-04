<?php
require_once 'utils' . DIRECTORY_SEPARATOR . 'autoloader.php';

session_start();


if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("Location: views/Dashboard.php");
}

header("Location: views/LoginPage.php");
?>