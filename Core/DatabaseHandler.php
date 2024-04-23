<?php

namespace Core;

class DatabaseHandler
{
    private $connection;
    private $statement;

    public function __construct(Database $database)
    {
        $this->connection = $database->connection;
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
