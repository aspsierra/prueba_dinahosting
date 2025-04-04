<?php
namespace controllers;

class AuthController {

    private array $defaultConfig;

    public function __construct($config){
        $this->defaultConfig = parse_ini_file('.env');
    }

    public function showLogin(){
        require_once 'views/LoginPage.php';
    }

    public function isLoggedIn() {
        return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
    }

    public function login(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["user"];
            $password = $_POST["password"];
            
            if (empty($username) || empty($password)) {
                $_SESSION["err"] = "Escribe usuario y contraseña";
                $this->showLogin();
            } else if ($username === $this->defaultConfig['DB_ADMIN_USER'] && $password === $this->defaultConfig['DB_ADMIN_PASSWORD']) {
                $_SESSION['user'] = $username;
                $_SESSION["loggedIn"] = true;
                header("Location: /index.php");
            } else {
                $_SESSION["err"] = "Usuario o contraseña incorrectos";
                $this->showLogin();
            }

        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }

}