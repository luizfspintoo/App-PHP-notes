<?php

namespace Core;

use Exception;
use PDO;
use PDOException;

class Database
{
    /**
     * @var PDO
     */
    public $connection;

    public function __construct()
    {
        // Criar array de configuração
        $config = [
            "host" => $_ENV['DB_HOST'],
            "port" => $_ENV['DB_PORT'],
            "dbname" => $_ENV['DB_NAME'],
            "charset" => $_ENV['DB_CHARSET'],
            "username" => $_ENV['DB_USERNAME'],
            "password" => $_ENV['DB_PASSWORD']
        ];

        $dns = "mysql:" . http_build_query($config, "", ";");

        try {
            $this->connection = new PDO($dns, $config["username"], $config["password"], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $error) {
            throw new Exception('DATABASE_ERROR');
        }
    }
}
