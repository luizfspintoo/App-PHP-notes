<?php 

namespace Core;

use Core\Database;
use Core\Validator;

class Notes
{
    public function createNote($body, $currentId)
    {
        try {
            $erros = [];
            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
            }
            if (empty($erros)) {
                App::resolve(Database::class)->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
                    "body" => $body,
                    "user_id" => $currentId
                ]);
                return true; 
            }
            return $erros; 
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao criar nota";
            } else {
                $erros["body"] = "Erro desconhecido";
            }
            return $erros;
        }
    }

    public function getAllNotes($currentId)
    {
        try {
            $result = App::resolve(Database::class)->query("SELECT * FROM notes WHERE user_id = :user_id", [
                "user_id" => $currentId
            ])->get();
            return $result;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros['erro'] = "Houve um erro ao carregar as notas"; 
            } else {
                $erros['erro'] = "Erro desconhecido"; 
            }
            return $erros;
        }
    }

    public function showNote($id)
    {
        try {
            $result = App::resolve(Database::class)->query("SELECT * FROM notes WHERE id = :id", [
                "id" => $id
            ])->findOrFail();
            return $result;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros['erro'] = "Houve um erro ao carregar a nota"; 
            } else {
                $erros['erro'] = "Erro desconhecido"; 
            }
            return $erros;
        }
    }

    public function getNoteToEdit($id)
    {
        try {
            $result = App::resolve(Database::class)->query("SELECT * FROM notes WHERE id = :id", [
                "id" => $id
            ])->findOrFail();
            return $result;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros['erro'] = "Houve um erro ao carregar a nota"; 
            } else {
                $erros['erro'] = "Erro desconhecido"; 
            }
            return $erros;
        }
    }

    public function updateNote($id, $body, $currentId)
    {

        try {
            $note = $this->getNoteToEdit($id);
            autorize($note["user_id"] === $currentId);
            $erros = [];
            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
            }
            if (empty($erros)) {
                App::resolve(Database::class)->query("UPDATE notes SET body = :body WHERE id = :id", [
                    "id" => $id,
                    "body" => $body
                ]);
                return true;
            }
            return $erros;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao atualizar nota";
            } else {
                $erros = "Erro desconhecido"; 
            }
            return $erros;
        }
    }
    
    public function deleteNoteById($id, $currentId)
    {

        try {
            $note = $this->getNoteToEdit($id);
            autorize($note["user_id"] === $currentId);
    
            $noteDelete = App::resolve(Database::class)->query("DELETE FROM notes WHERE id = :id", [
                "id" => $id
            ]);
    
            if (! $noteDelete) {
                return false;
            }
    
            redirect("/notes");
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao deletar nota";
            } else {
                $erros["body"] = "Erro desconhecido";
            }
        }
    }
}
