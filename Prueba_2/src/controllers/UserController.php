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
}