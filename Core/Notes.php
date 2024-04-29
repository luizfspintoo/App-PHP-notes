<?php

namespace Core;

use Core\Models\NotesModel;
use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Core\Model;

class Notes
{

    /**
     * @var NotesModel
     */
    private $notesModel;

    public function __construct()
    {
        $this->notesModel = new NotesModel();
    }

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
                $this->notesModel->create([
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
            $result = $this->notesModel->allNotesByUser($currentId);
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
            $result = $this->notesModel->find($id);
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
            $result = $this->notesModel->find($id);
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
            $note = $this->notesModel->find($id);
            autorize($note["user_id"] === $currentId);
            $erros = [];
            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
            }
            if (empty($erros)) {
                $this->notesModel->updateNote($id, $body);
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
            $note = $this->notesModel->find($id);
            autorize($note["user_id"] === $currentId);
    
            $noteDelete = $this->notesModel->deleteNote($id);
    
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
