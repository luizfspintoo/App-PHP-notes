<?php
use Core\App;
use Core\Database;

require BASE_PATH . "Core/functions.php";
require base_path("bootstrap.php");

beforeAll(function () {
  // crias as tabelas no banco de dados
  $db = App::resolve(Database::class);
  $db->connection->query(file_get_contents(BASE_PATH . 'myapp.sql'));
});

describe('Core/Account', function () {
  describe('->getUserAccount()', function () {
    beforeEach(function () {
      //limpa a tabela users antes de cada teste
      $db = App::resolve(Database::class);
      $db->connection->query("DELETE FROM users");
    });

    it('deve retornar null quando o usuário não existe ', function () {
      $account = new \Core\Account();
      $result = $account->getUserAccount(1);
      expect($result)->toBeNull();
    });

    it('deve retornar o usuário quando existir', function () {
      //preenche o banco de dados com um usuário
      $db = App::resolve(Database::class);
      $db->connection->query("INSERT INTO users (email, password) VALUES ('john@email.com', 'password')");
      $lastId = $db->connection->lastInsertId();

      $account = new \Core\Account();
      $result = $account->getUserAccount($lastId);
      expect($result)->toBe(['id' => (int) $lastId, 'password' => 'password', 'email' => 'john@email.com']);
    });
  });
});