<?php

namespace Core;

use Core\Models\NotesModel;
use Core\Validator;
use Monolog\Level;

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

                Logger::info("Nota criada com sucesso");
                return true; 
            }
            return $erros; 
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao criar nota";
            } else {
                $erros["body"] = "Erro desconhecido";
            }
            Logger::error("Erro ao criar nota", ["error" => $e->getMessage()]);
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
        try {
            $note = $this->notesModel->find($id);
            autorize($note["user_id"] === $currentId);
            $erros = [];
            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
            }
            if (empty($erros)) {
                $this->notesModel->updateNote($id, $body);
                Logger::info("nota atualizada com sucesso");
                return true;
            }
            return $erros;
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao atualizar nota";
            } else {
                $erros = "Erro desconhecido"; 
            }
            Logger::error("Erro ao atualizar nota", ["error" => $e->getMessage()]);
            return $erros;
        }
    }
    
    public function deleteNoteById($id, $currentId)
    {
        try {
            $note = $this->notesModel->find($id);
            autorize($note["user_id"] === $currentId);
    
            $noteDelete = $this->notesModel->deleteNote($id);
    
            if (! $noteDelete) {
                return false;
            }
    
            Logger::info("nota deletada com sucesso");
            redirect("/notes");
        } catch (\Exception $e) {
            if($e->getMessage() == "DATABASE_ERROR") {
                $erros["body"] = "Houve um erro ao deletar nota";
            } else {
                $erros["body"] = "Erro desconhecido";
            }
            Logger::error("Erro ao deletar nota", ["error" => $e->getMessage()]);
        }
    }
}
