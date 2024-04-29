<?php

namespace Core;

use Core\Models\UsersModel;

// use Core\Model;

class Authenticator
{

    public function attempt($email, $password)
    {
        $usersModel = new UsersModel();
        $result = $usersModel->allUsers($email);
        $user = $result[0];

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
