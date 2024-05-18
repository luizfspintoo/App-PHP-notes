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

    $lastInsertedId = $this->connection->lastInsertId();
    return $lastInsertedId;
  }

  public function findAll()
  {
    $sql = "SELECT * FROM {$this->table}";
    return $this->query($sql)->fetchAll();
  }

  public function find($id)
  {
    $result = $this->findBy($this->primaryKey, $id);
    if (count($result) == 0) {
      return null;
    }

    return $result[0];
  }

  public function findBy($field, $value)
  {
    $sql = "SELECT * FROM {$this->table} WHERE {$field} = :{$field}";
    return $this->query($sql, [$field => $value])->fetchAll();
  }

  public function update($id, $data)
  {
      $fields = array_keys($data);
      $setClause = implode(" = :", $fields) . " = :" . end($fields);
      $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";
      return $this->query($sql, array_merge($data, ['id' => $id]));
  }

  public function delete($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = :id";
    return $this->query($sql, $id);
  }
  
  private function query($query, $parameters = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($parameters);

    return $this->statement;
  }

}