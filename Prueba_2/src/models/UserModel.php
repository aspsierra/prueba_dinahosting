<?php

namespace models;

use services\Database\DBHandler;

class UserModel {

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllUsers(){
        try {
            var_dump($this->db);
            $query = "SELECT user, host FROM mysql.user";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Error al consultar los usuarios: " . $e->getMessage());    
        }
    }

}