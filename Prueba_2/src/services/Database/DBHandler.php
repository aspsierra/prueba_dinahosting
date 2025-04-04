<?php

declare(strict_types=1);

namespace services\Database;

class DBHandler {

    private \PDO $PDO;
    private array $config;

    public function __construct(){
        $this->config = parse_ini_file('.env');
    }

    public function __destruct() {
        unset($this->PDO);
    }

    public function getConnection(){
        try {
            $this->PDO = new \PDO("mysql:host={$this->config['DB_HOST']};dbname={$this->config['DB_NAME']};charset=utf8",$this->config['DB_ADMIN_USER'], $this->config['DB_ADMIN_PASSWORD']);
        } catch (\PDOException $err) {
            die("Error de conexión: ". $err->getMessage());
        }
        return $this->PDO;
    }
    
}