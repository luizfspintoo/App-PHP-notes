<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_GET["id"]])->findOrFail();

autorize($note["user_id"] === $currentUserId);

// renderiza a view
view("notes/show.view.php", [
    "heading" => "Minha Anotação",
    "note" => $note
]);
