<?php

declare(strict_types=1);

namespace services\Database;

class DBHandler {

    private \PDO $PDO;
    private array $config;

    public function __construct($env){
        $this->config = $env;
    }

    public function __destruct() {
        unset($this->PDO);
    }

    public function connect(string $user, string $password){
        try {
            $this->PDO = new \PDO("mysql:host={$this->config['DB_HOST']};dbname={$this->config['DB_NAME']};charset=utf8", $user, $password);
        } catch (\PDOException $err) {
            echo $err->getMessage();
            var_dump($err);
        }
    }
    
}