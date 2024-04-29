<?php

namespace Core\Models;

class FeedbackModel extends Model
{

    protected $table = "feedback";

    public function insertFeedback($name, $email, $body, $currentId)
    {

        $parametros = [
            "name" => $name,
            "email" => $email,
            "body" => $body,
            "user_id" => $currentId
        ];

        return $this->create($parametros);
    }
}