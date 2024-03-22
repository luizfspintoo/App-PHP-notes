<?php

namespace Core;

use Core\Database;
use Core\Validator;

class Feedback 
{
    private $db;
    private $currentId;

    public function __construct(Database $db, $currentId)
    {
        $this->db = $db;
        $this->currentId = $currentId;
    }

    public function createFeedback($body)
    {
        $erros = [];

        if (!Validator::string($body, 10, 255)) {
            $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres por favor";
        }

        if (empty($erros)) {
            $this->db->query("INSERT INTO feedback(body, user_id) VALUES (:body, :user_id)", [
                "body" => $body,
                "user_id" => $this->currentId
            ]);

            return true; // Feedback criado com sucesso
        }

        return $erros; // Mensagens de erro
    }
}