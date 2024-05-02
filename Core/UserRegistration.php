<?php

namespace Core;

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
                Logger::warn("Tentativa de registro com email já cadastrado");
                return $erros;
            } else {
                $id = $this->usersModel->register($email, $password);

                $_SESSION["user"] = [
                    "email" => $email,
                    "id" => $id
                ];

                
                Logger::info("registrado com sucesso");
                redirect("/dashboard");
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["password"] = "Houve um erro ao registrar usuário";
            } else {
                $erros["password"] = "Erro desconhecido";
            }
            Logger::error("Erro a registrar", ["error" => $e->getMessage()]);
            return $erros;
        }
    }
}
