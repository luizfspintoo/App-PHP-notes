<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_GET["id"]])->findOrFail();

autorize($note["user_id"] === $currentId);

// renderiza a view
view("notes/show.view.php", [
    "heading" => "Minha Anotação",
    "note" => $note
]);
