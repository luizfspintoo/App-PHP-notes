<?php

namespace Core;

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;

class UserLogin
{
    public function login($email, $password)
    {
        $form = new LoginForm();
        try {
            if ($form->validate($email, $password)) {
                if ((new Authenticator)->attempt($email, $password)) {
                    redirect("/dashboard");
                } else {
                    $form->erro("email", "Email ou senha estão incorretos");
                }
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $form->erro("email", "Não foi possível conectar-se ao banco de dados");
            } else {
                $form->erro("email", "Erro desconhecido");
            }
        }
        Session::flash("erros", $form->erros());
        Session::flash("old", ["email" => $email]);
        redirect("/login");
    }
}
