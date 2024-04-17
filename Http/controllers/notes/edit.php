<?php

use Core\Notes;

$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes();

$note = $notes->getNoteToEdit($_GET["id"]);

view("notes/edit.view.php", [
    "heading" => "Editar Anotação",
    "note" => $note
]);