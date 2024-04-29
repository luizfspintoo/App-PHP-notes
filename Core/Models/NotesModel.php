<?php

namespace Core\Models;

class NotesModel extends Model
{
  protected $table = "notes";


  public function allNotesByUser($userId)
  {
    return $this->findBy("user_id", $userId);
  }

  public function updateNote($id, $body)
  {
    $parametros = [
      "body" => $body,
    ];

    return $this->update($id, $parametros);
  }

  public function deleteNote($id)
  {
    $parametros = [
      "id" => $id,
    ];

    return $this->delete($parametros);
  }
}