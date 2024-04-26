<?php

namespace Core;

use Dotenv\Dotenv;
use Exception;
use PDO;
use PDOException;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Database
{
    /**
     * @var PDO
     */
    public $connection;

    public function __construct()
    {

        // Carregar variáveis do .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        //log
        $log = new Logger("conexão com banco de dados ");
        $log->pushHandler(new StreamHandler("../logs/database.log", Level::Warning));

        // Criar array de configuração
        $config = [
            "host" => $_ENV['DB_HOST'],
            "port" => $_ENV['DB_PORT'],
            "dbname" => $_ENV['DB_NAME'],
            "charset" => $_ENV['DB_CHARSET'],
            "username" => $_ENV['DB_USERNAME'],
            "password" => $_ENV['DB_PASSWORD']
        ];

        if ($config["port"] !== 3306) {
            $log->error("Porta do banco de dados diferente da esperada {Class - Database}");
        }

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
