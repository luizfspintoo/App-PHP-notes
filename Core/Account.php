<?php

namespace Core;

use Core\Database;
use Core\Validator;

class Account
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserAccount($id)
    {
        return $this->db->query("SELECT * FROM users WHERE id = :id", [
            "id" => $id
        ])->get();
    }

    public function UpdateAccount($id, $password)
    {
        $erros = [];

        if (!Validator::string($password, 10, 20)) {
            $erros["password"] = "Senha inválida, mínimo 10 caracteres";
        }

        if (!empty($erros)) {
            return $erros;
        }

        return $this->db->query("UPDATE users SET password = :password WHERE id = :id", [
            "id" => $id,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }
}