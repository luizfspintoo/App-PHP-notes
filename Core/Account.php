<?php

namespace Core;

use Core\Validator;

class Account
{
    public function getUserAccount($id)
    {
        try {
            $result = App::resolve(Database::class)->query("SELECT * FROM users WHERE id = :id", [
                "id" => $id
            ])->find();
            return $result;
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["erro"] = "Hove um erro ao carregar informações da conta";
            } else {
                $erros["erro"] = "Erro desconhecido";
            }
            return $erros;
        }
    }

    public function UpdateAccount($id, $password)
    {
        try {
            $erros = [];
            if (!Validator::string($password, 10, 20)) {
                $erros["password"] = "Senha inválida, mínimo 10 caracteres";
            }
            if (!empty($erros)) {
                return $erros;
            }
            $result = App::resolve(Database::class)->query("UPDATE users SET password = :password WHERE id = :id", [
                "id" => $id,
                "password" => password_hash($password, PASSWORD_BCRYPT)
            ]);
            return $result;
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") { 
                //PAREI AQUI
                $erros = "Hove um erro ao atualizar informações da conta";
            } else {
                $erros = "Erro desconhecido";
            }
            return $erros;
        }
    }
}
