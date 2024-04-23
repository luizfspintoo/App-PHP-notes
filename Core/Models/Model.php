<?php

namespace Core\Models;

use Core\App;
use Core\Database;

abstract class Model
{
  /**
   * @var \PDO
   */
  protected $connection;

  /**
   * @var \PDOStatement
   */
  private $statement;

  protected $table;

  protected $primaryKey = "id";

  public function __construct()
  {
    $this->connection = App::resolve(Database::class)->connection;
  }

  public function create($data)
  {
    $fields = array_keys($data);
    $sql = "INSERT INTO {$this->table} (" . implode(",", $fields) . ") VALUES (:" . implode(",:", $fields) . ")";
    $this->query($sql, $data);
  }
  public function findAll()
  {
    $sql = "SELECT * FROM {$this->table}";
    return $this->query($sql)->fetchAll();
  }

  public function find($id)
  {
    return $this->findBy($this->primaryKey, $id)[0];
  }

  public function findBy($field, $value)
  {
    $sql = "SELECT * FROM {$this->table} WHERE {$field} = :{$field}";
    return $this->query($sql, [$field => $value])->fetchAll();
  }

  private function query($query, $parameters = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($parameters);

    return $this->statement;
  }

}