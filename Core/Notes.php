<?php 

namespace Core;

use Core\Database;
use Core\Validator;

class Notes
{
    private $db;
    private $currentId;

    public function __construct(Database $db, $currentId)
    {
        $this->db = $db;
        $this->currentId = $currentId;
    }

    public function createNote($body)
    {
        $erros = [];

        if (!Validator::string($body, 10, 255)) {
            $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
        }

        if (empty($erros)) {
            $this->db->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
                "body" => $body,
                "user_id" => $this->currentId
            ]);

            return true; // Nota criada com sucesso
        }

        return $erros; // Mensagens de erro
    }

    public function getAllNotes()
    {
        return $this->db->query("SELECT * FROM notes WHERE user_id = :user_id", [
            "user_id" => $this->currentId
        ])->get();
    }

    public function showNote($id)
    {
        return $this->db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();
    }

    public function getNoteToEdit($id)
    {
        return $this->db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();
    }

    public function updateNote($id, $body, $currentId)
    {

        $note = $this->getNoteToEdit($id);

        autorize($note["user_id"] === $currentId);

        $erros = [];

        if (!Validator::string($body, 10, 255)) {
            $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres";
        }

        if (empty($erros)) {
            $this->db->query("UPDATE notes SET body = :body WHERE id = :id", [
                "id" => $id,
                "body" => $body
            ]);

            return true; 
        }

        // Mensagens de erro e valor da nota original
        return [
            "erros" => $erros,
            "note" => $note 
        ];
    }
    
    public function deleteNoteById($id, $currentId)
    {

        $note = $this->getNoteToEdit($id);
        autorize($note["user_id"] === $currentId);

        // Exclua a nota
        $noteDelete = $this->db->query("DELETE FROM notes WHERE id = :id", ["id" => $id]);

        if (! $noteDelete) {
            return false;
        }

        redirect("/notes");
    }
}
