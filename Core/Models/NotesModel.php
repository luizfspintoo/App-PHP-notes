<?php

namespace Core\Models;

class NotesModel extends Model
{
  protected $table = "notes";


  public function allNotesByUser($userId)
  {
    return $this->findBy("user_id", $userId);
  }
}