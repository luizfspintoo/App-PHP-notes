<?php

namespace Core;

use Core\Model;

class Authenticator
{
    public function attempt($email, $password)
    {
        $model = new Model();
        $user = $model->findUser($email);

        if ($user) {
            if (password_verify($password, $user["password"])) {
                $this->login($user);
                return true;
            }
        }
    }

    public function login($user)
    {
        $_SESSION["user"] = [
            "email" => $user["email"],
            "id" => $user["id"]
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
