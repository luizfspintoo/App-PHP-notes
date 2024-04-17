<?php

namespace Core;

use Core\Database;

class UserRegistration
{
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

            $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
                "email" => $email
            ])->find();

            if ($user) {
                $erros["email"] = "Já existe uma conta cadastrada com este email. Por favor, tente com outro email.";
                return $erros;
            } else {
                $id = App::resolve(Database::class)->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_BCRYPT)
                ])->lastId();

                $_SESSION["user"] = [
                    "email" => $email,
                    "id" => $id
                ];

                redirect("/dashboard");
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["password"] = "Houve um erro ao registrar usuário";
            } else {
                $erros["password"] = "Erro desconhecido";
            }
            return $erros;
        }
    }
}
