<?php 

use Core\Notes;

$currentId = intval($_SESSION["user"]["id"]); 
$objetoNotes = new Notes();

$notes = $objetoNotes->getAllNotes($currentId);

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);