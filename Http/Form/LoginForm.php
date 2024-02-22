<?php

namespace Http\Form;

use Core\Validator;

class LoginForm
{

    protected $erros = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $erros["email"] = "O formato do email é inválido";
        }

        if (!Validator::string($password)) {
            $erros["password"] = "A senha inválida";
        }

        return empty($this->erros);
    }

    public function erros()
    {
        return $this->erros;
    }

    public function erro($field, $message)
    {
        $this->erros[$field] = $message;
    }
}
