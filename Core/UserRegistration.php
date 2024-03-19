<?php

namespace Core;

use Core\Database;

class UserRegistration
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function registerUser($email, $password)
    {
        if (! Validator::email($email)) {
            $erros["email"] = "Este email não é valído";
        }
        
        if (! Validator::string($password, 10, 15)) {
            $erros["password"] = "Senha invalida, minino 10 caracteres";
        }

        if (! empty($erros)) {
            return $erros;
        }

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();

        if ($user) {
            $erros["email"] = "Já existe uma conta cadastrada com este email. Por favor, tente com outro email.";
            return $erros;
        } else {
            $this->db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT)
            ]);

            $this->createSessionUser($email);
            redirect("/dashboard");
        }
    }

    public function createSessionUser($email)
    {
        $_SESSION["user"] = [
            "email" => $email
        ];

        sleep(1);
        return true; // Registro bem-sucedido
    }
}