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
                    Logger::info('login realizado com sucesso');
                    redirect("/dashboard");
                } else {
                    $form->erro("email", "Email ou senha estão incorretos");
                    Logger::warn("Tentativa de login com credenciais inválidas");
                }
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $form->erro("email", "Houve um erro ao realizar login");
            } else {
                $form->erro("email", "Erro desconhecido");
            }
            Logger::error("Erro ao realizar login", ["error" => $e->getMessage()]);
        }
        Session::flash("erros", $form->erros());
        Session::flash("old", ["email" => $email]);
        redirect("/login");
    }
}
