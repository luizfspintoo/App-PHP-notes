<?php

namespace Core;

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class UserLogin
{
    public function login($email, $password)
    {
       $log = new Logger('registro de usuario ');
       $log->pushHandler(new StreamHandler('../logs/login.log', Level::Info));

        $form = new LoginForm();
        try {
            if ($form->validate($email, $password)) {
                if ((new Authenticator)->attempt($email, $password)) {
                    $log->info('login realizado com sucesso');
                    redirect("/dashboard");
                } else {
                    $form->erro("email", "Email ou senha estão incorretos");
                }
            }
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $form->erro("email", "Houve um erro ao realizar login");
                $log->error("erro ao realizar login {Class - Login}");
            } else {
                $form->erro("email", "Erro desconhecido");
            }
        }
        Session::flash("erros", $form->erros());
        Session::flash("old", ["email" => $email]);
        redirect("/login");
    }
}
