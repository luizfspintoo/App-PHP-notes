<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = 1;
$notes = new Notes($db, $currentId = 1);

$note = $notes->showNote($_GET["id"]);
autorize($note["user_id"] === $currentId);

// renderiza a view
view("notes/show.view.php", [
    "heading" => "Minha Anotação",
    "note" => $note
]);
