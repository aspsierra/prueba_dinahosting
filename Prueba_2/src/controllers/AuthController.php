<?php
namespace controllers;
session_start();

$env = parse_ini_file('../.env');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["password"];
    
    if (empty($username) || empty($password)) {
        $_SESSION["err"] = "Escribe usuario y contraseña";
        header("Location: ../views/LoginPage.php");
    } else if ($username === $env['DB_ADMIN_USER'] && $password === $env['DB_ADMIN_PASSWORD']) {
        $_SESSION["loggedIn"] = true;
        header("Location: ../views/Dashboard.php");
    } else {
        $_SESSION["err"] = "Usuario o contraseña incorrectos";
        header("Location: ../views/LoginPage.php");
    }
}