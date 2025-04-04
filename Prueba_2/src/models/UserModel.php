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
            $query = "SELECT user, host FROM mysql.user";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($users as &$user) {
                $grantQuery = "SHOW GRANTS FOR `" . $user['user'] . "`@`" . $user['host'] . "`";
                $grantStmt = $this->db->prepare($grantQuery);
                $grantStmt->execute();
                $grants = $grantStmt->fetchAll(\PDO::FETCH_ASSOC);
    
                $user['privileges'] = array_map(function ($row) {
                    return array_values($row)[0];
                }, $grants);            
            }
    
            return $users;
        } catch (\PDOException $e) {
            die("Error al consultar los usuarios: " . $e->getMessage());    
        }
    }

    public function getUserDetails($user, $host){
        try {
            $query = "SELECT user, host FROM mysql.user WHERE user = :user AND host = :host";
            $stmt = $this->db->prepare($query);
            
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':host', $host);
            $stmt->execute();
    
            $userDetails = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if (!$userDetails) {
                throw new Exception("Usuario no encontrado.");
            }
    
            $grantQuery = "SHOW GRANTS FOR :user@'". $userDetails['host'] ."'";
            $grantStmt = $this->db->prepare($grantQuery);
            
            $grantStmt->bindParam(':user', $userDetails['user']);
            $grantStmt->execute();
            
            $grants = $grantStmt->fetchAll(\PDO::FETCH_ASSOC);
    
            $userDetails['privileges'] = $grants;          

            return $userDetails;
        } catch (\PDOException $e) {
            die("Error al consultar el usuario: " . $e->getMessage());    
        }
    }

    public function addUser($username, $password, $host, $privileges) {
        try {
            $query = "CREATE USER '$username'@'$host' IDENTIFIED BY :password";
            $stmt = $this->db->prepare($query);
    
            $stmt->bindParam(":password", $password);
    
            if ($stmt->execute()) {
                $this->setPrivileges($username, $privileges, $host);
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $err) {
            throw $err;
        }
    }

    private function setPrivileges($username, $privileges, $host) {
        try {
            $query = "GRANT " . $privileges . " ON *.* TO '$username'@'$host'";
            $stmt = $this->db->prepare($query);
            return $stmt->execute();
        } catch (\PDOException $th) {
            throw new \PDOException("Ocurrió un error,\nAsegúrate de que los privilegios están bien escritos y separados por comas \n(Ej: SELECT, INSERT)", 1);
        }
    }
    
    
    public function deleteUser($username, $host) {
        try {
            $this->db->exec("DROP USER '$username'@'$host'");
            return true;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }


}