<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes($db, $currentId);

$note = $notes->showNote($_GET["id"]);
autorize($note["user_id"] === $currentId);

// renderiza a view
view("notes/show.view.php", [
    "heading" => "Minha Anotação",
    "note" => $note
]);
