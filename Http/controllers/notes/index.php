<?php 

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]); 
$objetoNotes = new Notes($db, $currentId);
$notes = $objetoNotes->getAllNotes();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);