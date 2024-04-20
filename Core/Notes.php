<?php 

namespace Core;

use Core\Database;
use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Notes
{
    public function createNote($body, $currentId)
    {

        $log = new Logger("registro de notas ");
        $log->pushHandler(new StreamHandler("../logs/notes.log", Level::Info));

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
                $log->info("nota criada com sucesso");
                return true; 
            }
            return $erros; 
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao criar nota";
                $log->error("Houve um erro ao criar nota {Class - Notes}");
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
        $log = new Logger("Atualização da nota ");
        $log->pushHandler(new StreamHandler("../logs/notes.log", Level::Info));

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
                $log->info("nota atualizada com sucesso");
                return true;
            }
            return $erros;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao atualizar nota";
                $log->error("Houve um erro ao atualizar nota {Class - Notes}");
            } else {
                $erros = "Erro desconhecido"; 
            }
            return $erros;
        }
    }
    
    public function deleteNoteById($id, $currentId)
    {

        $log = new Logger("Deletar nota ");
        $log->pushHandler(new StreamHandler("../logs/notes.log", Level::Info));

        try {
            $note = $this->getNoteToEdit($id);
            autorize($note["user_id"] === $currentId);
    
            $noteDelete = App::resolve(Database::class)->query("DELETE FROM notes WHERE id = :id", [
                "id" => $id
            ]);
    
            if (! $noteDelete) {
                return false;
            }
    
            $log->info("nota deletada com sucesso");
            redirect("/notes");
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao deletar nota";
                $log->info("Houve um erro ao deletar nota {Class - Notes}");
            } else {
                $erros["body"] = "Erro desconhecido";
            }
        }
    }
}
