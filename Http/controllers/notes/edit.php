<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$id = $_GET["id"];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();

view("notes/edit.view.php", [
    "heading" => "Editar Anotação",
    "note" => $note
]);