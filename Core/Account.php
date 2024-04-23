<?php

namespace Core;

use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Core\Model;

class Account
{
    public function getUserAccount($id)
    {
        try {
            $model = new Model();
            $result = $model->getUsers($id);
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
        $log = new Logger("conta usuario ");
        $log->pushHandler(new StreamHandler("../logs/account.log", Level::Info));
        try {
            $erros = [];
            if (!Validator::string($password, 10, 50)) {
                $erros["password"] = "Senha inválida, mínimo 10 caracteres";
            }
            if (!empty($erros)) {
                return $erros;
            }

            $model = new Model();
            $model->updatePasswordUser($id, $password);
            $log->info("senha atualizada com sucesso");
            \redirect('/dashboard');

        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") { 
                //PAREI AQUI
                $erros = "Hove um erro ao atualizar informações da conta";
                $log->info("Erro ao atualizar informações da conta");
            } else {
                $erros = "Erro desconhecido";
            }
            return $erros;
        }
    }
}
