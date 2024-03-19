<?php 

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = 1; 
$objetoNotes = new Notes($db, $currentId);
$notes = $objetoNotes->getAllNotes();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);