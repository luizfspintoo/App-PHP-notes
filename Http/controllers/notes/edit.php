<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes($db, $currentId);

$note = $notes->getNoteToEdit($_GET["id"]);

view("notes/edit.view.php", [
    "heading" => "Editar Anotação",
    "note" => $note
]);