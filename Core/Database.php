<?php

namespace Core;

use Exception;
use PDO;
use PDOException;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config)
    {
        $dns = "mysql:" . http_build_query($config, "", ";");

        try {
            $this->connection = new PDO($dns, $config["username"], $config["password"], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $error) {
            throw new Exception('DATABASE_ERROR');
        }
    }

    public function query($query, $parameters = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($parameters);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public function lastId()
    {
        return $this->connection->lastInsertId();
    }
}
