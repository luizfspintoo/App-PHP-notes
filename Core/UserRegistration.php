<?php

namespace Core;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Core\Model;
use Core\Models\UsersModel;

class UserRegistration
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }


    public function registerUser($email, $password)
    {

        // create a log channel
        $log = new Logger("registro de usuario ");
        $log->pushHandler(new StreamHandler("../logs/register.log", Level::Warning));

        try {
            if (!Validator::email($email)) {
                $erros["email"] = "Este email não é valído";
            }

            if (!Validator::string($password, 10, 50)) {
                $erros["password"] = "Senha invalida, minino 10 caracteres";
            }

            if (!empty($erros)) {
                return $erros;
            }

            $user = $this->usersModel->allUsers($email);

            if ($user) {
                $erros["email"] = "Já existe uma conta cadastrada com este email. Por favor, tente com outro email.";
                return $erros;
            } else {
                // $model = new Model();
                $id = $this->usersModel->register($email, $password);

                $_SESSION["user"] = [
                    "email" => $email,
                    "id" => $id
                ];

                
                $log->warning("registrado com sucesso");
                redirect("/dashboard");
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["password"] = "Houve um erro ao registrar usuário";
                $log->error("erro a registrar {Class - UserRegistration}");
            } else {
                $erros["password"] = "Erro desconhecido";
            }
            return $erros;
        }
    }
}
