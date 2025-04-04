<?php

namespace controllers;

use models\UserModel;

class UserController {
    private UserModel $user;

    public function __construct($db){
        $this->user = new UserModel($db);
    }

    public function listUsers(){
        $users = $this->user->getAllUsers();
        require_once 'views/Dashboard.php';
    }

    public function getUserDetails($user, $host){
        $user = $this->user->getUserDetails($user, $host);
        require_once 'views/UserDetails.php';
    }

    public function showAddUserForm() {
        require_once 'views/AddUser.php';
    }

    public function addUser($username, $password, $host, $privileges) {
        if (empty($username) || empty($password) || empty($host) || empty($privileges)) {
            $_SESSION['err'] = "Por favor, rellene todos los campos.";
            $this->showAddUserForm();
        }else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            try {
                if ($this->user->addUser($username, $hashedPassword, $host, $privileges)) {
                    header("Location: index.php");
                } else {
                    $_SESSION['err'] = "Hubo un error al agregar el usuario.";
                    $this->showAddUserForm();
                }
            } catch (\PDOException $err) {
                $_SESSION['err'] = $err->getMessage();
                $this->showAddUserForm();
            }
        }

    }
}