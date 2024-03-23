<?php

namespace Core;

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;
use Core\Database;

class UserLogin
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $form = new LoginForm();

        if ($form->validate($email, $password)) {
            if ((new Authenticator)->attempt($email, $password)) {

                $id = $this->db->query("SELECT id FROM users WHERE email = :email", [
                    "email" => $email,
                ])->find();

                $_SESSION["user"] = [
                    "email" => $email,
                    "id" => $id
                ];
    
                sleep(1);
                redirect("/dashboard");

            } else {
                $form->erro("email", "Email ou senha estão incorretos");
            }
        }

        Session::flash("erros", $form->erros());
        Session::flash("old", ["email" => $email]);

        redirect("/login"); // Redirecionamento com erros
    }
}
