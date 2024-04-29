<?php

namespace Core\Models;

class UsersModel extends Model
{
    protected $table = "users";

    public function allUsers($email)
    {
        return $this->findBy("email", $email);
    }

    public function register($email, $password)
    {
        $parametros = [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ];

        return $this->create($parametros);
    }

    public function updateAccount($id, $password)
    {
        $parametros = [
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ];

        return $this->update($id, $parametros);
    }
}
