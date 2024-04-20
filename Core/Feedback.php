<?php

namespace Core;

use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Feedback 
{
    public function createFeedback($body, $currentId)
    {
        $log = new Logger("Feedback usuario ");
        $log->pushHandler(new StreamHandler("../logs/feedback.log", Level::Info));
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
                $log->info("Feedback enviada com sucesso");
                redirect("/dashboard");
            }
            return $erros; 
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["erro"] = "Houve um erro ao enviar feedback";
                $log->info("Houve um erro ao enviar feedback");
            } else {
                $erros["erro"] = "Erro desconhecido";
            }
            return $erros; 
        }
    }
}