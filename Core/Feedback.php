<?php

namespace Core;

use Core\Validator;

class Feedback 
{
    public function createFeedback($body, $currentId)
    {
        try {
            $erros = [];
            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres por favor";
            }
            if (empty($erros)) {
                App::resolve(Database::class)->query("INSERT INTO feedback(body, user_id) VALUES (:body, :user_id)", [
                    "body" => $body,
                    "user_id" => $currentId
                ]);

                redirect("/dashboard");
            }
            return $erros; 
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["erro"] = "Houve um erro ao criar feedback";
            } else {
                $erros["erro"] = "Erro desconhecido";
            }
            return $erros; 
        }
    }
}